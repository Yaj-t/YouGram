@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<div class="container videos index-page" style="margin-top: 20px;">
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4">
            <a href="{{ route('videos.show', $video) }}" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($video->thumbnail_path) }}" alt="Thumbnail">
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset($video->user->image) }}" alt="User Image">
                            </div>
                            <div class="col-md-10">
                                <h5>{{ \Illuminate\Support\Str::limit($video->videos_title, 30, '...') }}</h5>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -10px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <p>{{ $video->user->name }}</p>
                            </div>
                            <div class="col-md-3">
                                <p>Views: </p>
                            </div>
                            <div class="col-md-3">
                                <p>Likes: </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: -17px;">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">{{ $video->views }}</div>
                            <div class="col-md-3">{{ $video->likes->count() }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection