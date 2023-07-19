<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Video $video)
    {
        $user = auth()->user();
        $like = $user->likes()->where('video_id', $video->id)->first();

        if (!$like) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->video_id = $video->id;
            $like->save();

            return redirect()->back()->with('success', 'Video liked successfully!');
        } else {
            return redirect()->back()->with('error', 'You have already liked this video.');
        }
    }

    public function unlike(Video $video)
    {
        $user = auth()->user();
        $like = $user->likes()->where('video_id', $video->id)->first();

        if ($like) {
            $like->delete();

            return redirect()->back()->with('success', 'Video unliked successfully!');
        } else {
            return redirect()->back()->with('error', 'You have not liked this video.');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
