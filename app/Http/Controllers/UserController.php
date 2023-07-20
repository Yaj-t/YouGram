<?php

namespace App\Http\Controllers;

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
