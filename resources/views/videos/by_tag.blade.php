@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')

@extends('layouts.categories')

@section('content')
<h1 style="color:white;">Videos with tag: {{ $tag->name }}</h1>

<div class="container videos" style="margin-top: 20px;">
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4" style="margin-bottom: 20px;">
            <a href="{{ route('videos.show', $video) }}" target="_blank" rel="noopener noreferrer">
                <div class="card">
                    <div class="card-body" style="position: relative; padding-bottom: 56.25%;">
                        <img src="{{ asset($video->thumbnail_path) }}" alt="Thumbnail" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                    </div>
                    <div class="card-header" style="position: relative; margin-top: 20px;">
                        <div style="position: absolute; bottom: 10px; left: 10px;">
                            <img src="{{ $video->user->image }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%;">
                        </div>
                        <div style="padding-left: 60px;">
                            <h5>{{ $video->videos_title }}</h5>
                            <p style="font-size: 14px; margin-bottom: 0;">{{ $video->user->name }}</p>
                            <p style="font-size: 14px; margin-bottom: 0;">Views: {{ $video->views }}</p>
                            <p style="font-size: 14px; margin-bottom: 0;">Likes: {{ $video->likes->count() }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
