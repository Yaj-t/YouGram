<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
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
}
