<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Support\Str;
use Clockwork\Storage\Search;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        return view('discussions', [
            'title' => 'Discussions',
            'active' => 'discussions',
            'discussions' => Discussion::latest()->filter()->paginate(15)
        ]);
    }

    public function show(Discussion $discussion)
    {
        $discussion->load('comments.replies.user');

        return view('discussion.index', [
            'title' => 'Discussions',
            'active' => 'discussions',
            'discussion' => $discussion
        ]);
    }

    public function showCreatePage()
    {
        return view('discussion.create', [
            'title' => 'Start a new Discussion',
            'active' => 'discussions'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:discussions',
            'body' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Discussion::create($validateData);

        return redirect('/discussions')->with('success', 'New post has been added!');
    }

    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        // Check for existing slugs in the database and modify if necessary
        while (Discussion::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return response()->json(['slug' => $slug]);
    }

    public function storeComment(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body' => 'required'
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back()->with('success', 'Comment has been added!');
    }

    public function storeReply(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body' => 'required'
        ]);

        $input['user_id'] = auth()->user()->id;

        Reply::create($input);

        return back()->with('success', 'Reply has been added!');
    }

    public function destroy(Discussion $discussion)
    {
        // Only allow admins to delete discussions
        if (!auth()->user()->is_admin) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        
        Discussion::destroy($discussion->id);
        return redirect('/discussions')->with('success', 'Discussion has been deleted!');
    }
}
