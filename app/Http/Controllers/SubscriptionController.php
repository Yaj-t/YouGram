<?php
// app/Http/Controllers/SubscriptionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function subscribe(User $user)
    {
        auth()->user()->subscriptions()->attach($user->id);
        
        return redirect()->back()->with('success', 'Subscribed to ' . $user->name);
    }

    public function unsubscribe(User $user)
    {
        auth()->user()->subscriptions()->detach($user->id);

        return redirect()->back()->with('success', 'Unsubscribed from ' . $user->name);
    }

    
}
