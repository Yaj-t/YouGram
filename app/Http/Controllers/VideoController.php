<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Video;
use App\Models\User;
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

    public function adminIndex(Request $request)
    {
        $sort = $request->query('sort', 'views');

        $query = Video::withCount('likes')->with('tags');   

        if ($sort === 'likes') {
            $query->orderByDesc('likes_count');
        } elseif ($sort === 'views') {
            $query->orderByDesc('views');
        }

        $videos = $query->get();

        return view('videos.admin-index', compact('videos'));
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

    public function showAdmin(Video $video)
    {
        $video->increment('views');
        return view('videos.show-admin', compact('video'));
    }

    public function edit(Video $video)
    {
        $tags = Tag::all();
        $video_tags = $video->tags;

        return view('videos.edit', compact('video', 'tags', 'video_tags'));
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
            $video->thumbnail_path = Storage::url($thumbnailPath);
        }

        $video->save();

        $video->tags()->detach();
        
        $tags = $request->input('tags', []);
        if (isset($tags)) {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $video->tags()->attach($tag->id);
            }
        }

        if (auth()->user()->usertype === 'admin') {
            return redirect()->route('videos.admin-index');
        } else {
            return redirect()->route('videos.index');
        }
    }

    public function destroy(Video $video)
    {   
        // Delete the video file from storage if it exists
        if ($video->video_path) {
            Storage::delete('public/videos/' . basename($video->video_path));
        }

        // Delete the thumbnail file from storage if it exists
        if ($video->thumbnail_path) {
            Storage::delete('public/thumbnails/' . basename($video->thumbnail_path));
        }

        // Detach video tags before deleting the video
        $video->tags()->detach();

        // Delete the video record from the database
        $video->delete();

        return back();
    }

     public function userVideos(User $user)
    {
        $videos = $user->videos()->latest()->get();

        return view('videos.user_videos', compact('videos', 'user'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $videos = Video::where('videos_title', 'like', "%$query%")
                    ->orWhereHas('tags', function ($tagQuery) use ($query) {
                        $tagQuery->where('name', 'like', "%$query%");
                    })
                    ->orWhereHas('user', function ($userQuery) use ($query) {
                        $userQuery->where('name', 'like', "%$query%");
                    })
                    ->get();

        return view('videos.search', compact('videos'));
    }
    public function trending()
    {

        // fetch videos with the highest views in the last 7 days
    
        $videos = Video::whereDate('created_at', '>=', now()->subDays(7))
                               ->orderBy('views', 'desc')
                               ->get();
    
        return view('videos.trending', compact('videos'));
    }
}
