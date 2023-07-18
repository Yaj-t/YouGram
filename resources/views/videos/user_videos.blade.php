@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')

@section('content')
    <div class="container videos" style="margin-top: 20px;">
        <h1 class="text-center mb-4 text-white bg-dark rounded-lg" style="font-size: 2rem; padding: 10px;">Your Videos</h1>
        <div class="row">
            @if ($videos->isEmpty())
                <p>No videos uploaded yet.</p>
            @else
                @foreach ($videos as $video)
                    <div class="col-md-4" style="margin-bottom: 20px;">
                        <div class="card">
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
                                        <p style="font-size: 14px; margin-bottom: 0;">Likes: {{ $video->likes }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                            <div class="card-footer">
                                <a href="{{ route('videos.edit', $video) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('videos.destroy', $video) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
