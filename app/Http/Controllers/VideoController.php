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
        // Retrieve all videos
    }

    public function create()
    {
        // Show the form to create a new video
    }

    public function insert(Request $request, User $user, TagsController $tagsController)
    {
        $request->validate([
            'uv_video' => 'required|mimes:mp4', // Validate video file
            'uv_title' => 'required',
            'uv_description' => 'required',
        ]);

        $video = new Video();
        $video->user_id = $user->id;
        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');
        $video->save();

        // Get the selected tags from the request
        $selectedTags = $request->only(['php', 'cplusplus', 'mysql', 'swift', 'csharp', 'others']);

        // Store the selected tags in the tags table
        $tagsController->storeTags($video, $selectedTags);

        // Handle video file upload, if required
        if ($request->hasFile('uv_video')) {
            $videoFile = $request->file('uv_video');
            $videoPath = $videoFile->store('public/videos'); // Save the video file to the specified path
            $video->video_path = Storage::url($videoPath); // Store the video path in the database
            $video->save();
        }

        return redirect()->route('home');
    }

    public function show(Video $video)
    {
        // Show a specific video

    }

    // Other methods like edit, update, and destroy can be added as needed
}
