@extends('layouts.app')

@section('content')
    <div class="video-container">
        <video controls class="video embed-responsive-item">
            <source src="{{ $video->video_path }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="video-info container mt-4" style="color:white;">
        <div class="video-title mb-2">{{ $video->videos_title }}</div>
        <div class="uploader-info mb-2">
            <img src="{{ $video->user->image }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
            {{ $video->user->name }}
        </div>
        <div class="views-likes mb-2">
            <span>Views: {{ $video->views }}</span>
            <span>&nbsp;&middot;&nbsp;</span>
            <span>Likes: {{ $video->likes->count() }}</span>
        </div>
            <!-- Like/Unlike buttons -->
            @if (auth()->check())
                @if (auth()->user()->likes->contains('video_id', $video->id))
                    <form action="{{ route('unlike', $video) }}" method="post">
                        @csrf
                        <button type="submit">Unlike</button>
                    </form>
                @else
                    <form action="{{ route('like', $video) }}" method="post">
                        @csrf
                        <button type="submit">Like</button>
                    </form>
                @endif
            @endif
            <!-- Subscribe/Unsubscribe buttons -->
            @if(auth()->user()->id !== $video->user->id)
                @if(auth()->user()->isSubscribedTo($video->user))
                    <form action="{{ route('unsubscribe', $video->user) }}" method="post">
                        @csrf
                        <button type="submit">Unsubscribe</button>
                    </form>
                @else
                    <form action="{{ route('subscribe', $video->user) }}" method="post">
                        @csrf
                        <button type="submit">Subscribe</button>
                    </form>
                @endif
            @endif
        <div class="video-description mt-4">
            {{ $video->videos_description }}
        </div>
    </div>
@endsection
