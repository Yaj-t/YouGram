@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')

@extends('layouts.categories')
@section('content')

<div class="container videos" style="margin-top: 20px;">
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4" style="margin-bottom: 20px;">
            <a href="{{ route('videos.show', $video) }}" class="card-link">
                <div class="card">
                    <div class="card-thumbnail">
                        <img src="{{ asset($video->thumbnail_path) }}" alt="{{ $video->videos_title }}" class="thumbnail-image">
                        <div class="play-button"></div>
                    </div>
                    <div class="card-body">
                        <div class="uploader-info">
                            <img src="{{ asset($video->user->profile_pic) }}" alt="Profile Picture" class="uploader-profile-pic">
                            <div class="uploader-details">
                                <span class="uploader-name">{{ $video->user->name }}</span>
                                <span class="video-views">{{ $video->views }} views</span>
                            </div>
                        </div>
                        <h5 class="card-title">{{ $video->videos_title }}</h5>
                        <p class="card-text">{{ $video->videos_description }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
