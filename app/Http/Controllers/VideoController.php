<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();

        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uv_video' => 'required|mimes:mp4',
            'uv_title' => 'required',
            'uv_description' => 'required',
        ]);

        $user = Auth::user();

        $video = new Video();
        $video->user_id = $user->id;
        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');
        $video->save();

        if ($request->hasFile('uv_video')) {
            $videoFile = $request->file('uv_video');
            $videoPath = $videoFile->store('public/videos');
            $video->video_path = Storage::url($videoPath);
            $video->save();
        }

        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'uv_title' => 'required',
            'uv_description' => 'required',
        ]);

        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');
        $video->save();

        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        // Optionally, delete the associated video file from storage

        return redirect()->route('videos.index');
    }
}
