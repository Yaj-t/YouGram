@extends('layouts.app')

@section('content')
    <h1>{{ $video->videos_title }}</h1>
    <p>{{ $video->videos_description }}</p>
    <video controls>
        <source src="{{ $video->video_path }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <br>
    <a href="{{ route('videos.edit', $video) }}">Edit</a>
    <form action="{{ route('videos.destroy', $video) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection