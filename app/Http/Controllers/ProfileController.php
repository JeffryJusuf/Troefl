<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'title' => 'Profile',
            'discussions' => Discussion::where('user_id', auth()->user()->id)->paginate(3)
        ]);
    }

}
