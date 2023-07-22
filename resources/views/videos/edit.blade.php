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
        <div class="form-group">
            <label>{{ __('Tags') }}</label><br>
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->name }}" id="tag_{{ $tag->id }}"
                        @if(in_array($tag->name, $video_tags->pluck('name')->toArray())) checked @endif>
                    <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <input type="submit" value="Update">
    </form>
@endsection
