<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
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
        // Show the form to create a new video
    }

    public function insert(Request $request, User $user, TagsController $tagsController)
    {
        $request->validate([
            'uv_video' => 'required|mimes:mp4',
            'uv_title' => 'required',
            'uv_description' => 'required',
        ]);

        $video = new Video();
        $video->user_id = $user->id;
        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');
        $video->save();

        $selectedTags = $request->only(['php', 'cplusplus', 'mysql', 'swift', 'csharp', 'others']);

        $tagsController->storeTags($video, $selectedTags);

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
        // Show a specific video

    }

    // Other methods like edit, update, and destroy can be added as needed
}
