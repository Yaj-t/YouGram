<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Retrieve all users from the users table

        return view('users-admin', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'up_image' => 'image|mimes:jpeg,jpg',
        ]);

        if ($request->hasFile('up_image')) {
            $imageName = time() . '.' . $request->file('up_image')->getClientOriginalExtension();
            $path = $request->file('up_image')->storeAs('public/images/images-profile', $imageName);
            $user->image = 'storage/images/images-profile/' . $imageName;
        }

        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        $user->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $profile)
    {
        //
    }
}
