@extends('layouts.app')

@section('content')
    <h1>Edit Video</h1>
    <form action="{{ route('videos.update', $video) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="uv_title">Title:</label>
        <input type="text" name="uv_title" id="uv_title" value="{{ $video->videos_title }}">
        <br>
        <label for="uv_description">Description:</label>
        <textarea name="uv_description" id="uv_description" rows="4">{{ $video->videos_description }}</textarea>
        <br>
        <input type="submit" value="Update">
    </form>
@endsection
