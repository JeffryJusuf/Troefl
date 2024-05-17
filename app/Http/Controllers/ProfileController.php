<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile', [
            'title' => 'Profile',
            'discussions' => Discussion::where('user_id', auth()->user()->id)->paginate(3),
            'is_admin' => $user->is_admin
        ]);
    }
}
