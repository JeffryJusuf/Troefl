<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
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
}
