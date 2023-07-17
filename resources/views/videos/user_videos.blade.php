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
                            <div class="card-header">
                                <h5>{{ $video->videos_title }}</h5>
                            </div>
                            <div class="card-body" style="position: relative; padding-bottom: 56.25%;">
                                <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <source src="{{ asset($video->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('videos.show', $video) }}" class="btn btn-primary">View</a>
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
