<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function adminIndex(){
        $users = User::where('usertype', 'yougrammer')->get();

        return view('users-admin', compact('users'));
    }

    public function show(User $user)
    {
        $videos = $user->videos;
        $subscribers = $user->subscribers;
        $subscriptions = $user->subscriptions;
        $likedVideos = $user->likes()->with('video')->get();
        dd(compact('user', 'videos', 'subscribers', 'subscriptions', 'likedVideos'));

        return view('profile.show', compact('user', 'videos', 'subscribers', 'subscriptions', 'likedVideos'));
    }
    public function subscriptions(User $user)
    {
        $subscriptions = $user->subscriptions;
        return view('user.subscriptions', compact('user', 'subscriptions'));
    }

    public function subscribers(User $user)
    {
        $subscribers = $user->subscribers;
        // dd(compact('user', 'subscribers'));
        return view('user.subscribers', compact('user', 'subscribers'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update user data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Update password if provided
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('admin.user');
    }

    public function destroy(User $user)
    {
        // Add authorization check to ensure only authorized users can delete users
        if (!auth()->user()->can('delete', $user)) {
            return back()->with('error', 'Unauthorized action.');
        }

        // Perform user deletion
        $user->videos()->delete();
        $user->likes()->delete();
        $user->subscriptions()->delete();
 
    
        // Delete the user
        $user->delete();

        return back();
    }
}
