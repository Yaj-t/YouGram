<?php

namespace App\Http\Controllers;
use App\Models\Tag;
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

    public function videosWithTag($tag)
    {
        $tag = Tag::where('name', $tag)->firstOrFail();
        $videos = $tag->videos;

        return view('videos.by_tag', compact('tag', 'videos'));
    }

    public function create()    
    {   
        $tags = Tag::all();

        return view('videos.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uv_video' => 'required|mimes:mp4',
            'uv_title' => 'required',
            'uv_description' => 'required',
            'tags' => 'nullable|array',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        $video = new Video();
        $video->user_id = $user->id;
        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');

        if ($request->hasFile('uv_video')) {
            $videoFile = $request->file('uv_video');
            $videoPath = $videoFile->store('public/videos');
            $video->video_path = Storage::url($videoPath);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = $thumbnailFile->store('public/thumbnails');
            $video->thumbnail_path = Storage::url($thumbnailPath);
        }

        $video->save();

        // Handle video tags
        $tags = $request->input('tags', []);
        if (isset($tags)) {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $video->tags()->attach($tag->id);
            }
        }

        return redirect()->route('videos.index');
    }


    public function show(Video $video)
    {
        $video->increment('views');
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
            'tags' => 'nullable|array',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $video->videos_title = $request->input('uv_title');
        $video->videos_description = $request->input('uv_description');

        if ($request->hasFile('thumbnail')) {
            // Delete the existing thumbnail
            if ($video->thumbnail_path) {
                Storage::delete($video->thumbnail_path);
            }

            $thumbnailFile = $request->file('thumbnail');
            $thumbnailPath = $thumbnailFile->store('public/thumbnails');
            $video->thumbnail_path = $thumbnailPath;
        }

        $video->save();

        $tags = $request->input('tags', []);
        $video->tags()->sync($tags);

        return redirect()->route('videos.index');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        // Optionally, delete the associated video file from storage

        return back();
    }

     public function userVideos()
    {
        $user = Auth::user();
        $videos = $user->videos()->latest()->get();

        return view('videos.user_videos', compact('videos'));
    }
    
}
