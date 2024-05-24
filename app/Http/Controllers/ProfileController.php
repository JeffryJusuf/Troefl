<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function showUpdatePage()
    {
        return view('profile/edit', [
            'title' => 'Edit Profile'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        $rules = [
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $data = [];

        if ($request->filled('username')) 
        {
            $rules = array_merge($rules, [
                'username' => 'nullable|string|regex:/^[a-zA-Z0-9]+$/|min:3|max:30|unique:users,username,' . $user->id,
            ]);
        }

        if ($request->filled('password')) 
        {
            $rules = array_merge($rules, [
                'old_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Check if the old password matches
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
            }

            // Update the user's password
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->filled('username')) 
        {
            $user->username = $request->input('username');
        }

        if ($request->hasFile('profile_picture')) 
        {
            // Delete old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Save new profile picture
            $image = $request->file('profile_picture');
            $imagePath = $image->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->update($data);

        return redirect('/profile')->with('success', 'Profile updated successfully.');
    }
}
