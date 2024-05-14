<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        return view('discussions', [
            'title' => 'Discussions',
            'active' => 'discussions',
            'discussions' => Discussion::all()
        ]);
    }

    public function show(Discussion $discussion)
    {
        return view('discussion', [
            'title' => 'Discussions',
            'active' => 'discussions',
            'discussion' => $discussion
        ]);
    }
}
