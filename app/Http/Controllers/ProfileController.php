<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discussion;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $averageScore = $this->getAverageScore($user->id);

        return view('profile', [
            'title' => 'Profile',
            'discussions' => Discussion::where('user_id', auth()->user()->id)->latest()->paginate(3),
            'is_admin' => $user->is_admin,
            'averageScore' => $averageScore,
            'active' => 'profile'
        ]);
    }

    private function getAverageScore($userId)
    {
        return DB::table('scores')
            ->where('user_id', $userId)
            ->avg('score');
    }

    public function showUpdatePage()
    {
        return view('profile/edit', [
            'title' => 'Edit Profile',
            'active' => 'profile'
        ]);
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        // Define base validation rules
        $rules = [
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        // Add conditional validation rules
        if ($request->filled('username')) {
            $rules['username'] = 'nullable|string|regex:/^[a-zA-Z0-9]+$/|min:3|max:30|unique:users,username,' . $user->id;
        }

        if ($request->filled('password')) {
            $rules['old_password'] = 'required|string';
            $rules['password'] = 'required|string|min:8';
        }

        // Validate request
        $validatedData = $request->validate($rules);

        // Check if the old password matches if password change is requested
        if ($request->filled('password') && !Hash::check($request->input('old_password'), $user->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
        }

        // Update user details
        if ($request->filled('username')) {
            $user->username = $request->input('username');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Save new profile picture
            $image = $request->file('profile_picture');
            $imagePath = $image->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully.');
    }

    public function showScore()
    {
        return view('profile.scores', [
            'title' => 'Score',
            'scores' => Score::where('user_id', auth()->user()->id)->latest()->paginate(10),
            'active' => 'profile'
        ]);
    }
}
