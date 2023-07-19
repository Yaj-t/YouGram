<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $subscriptions = $user->subscriptions;
        $subscribers = $user->subscribers;

        return view('user.profile', compact('user', 'subscriptions', 'subscribers'));
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
