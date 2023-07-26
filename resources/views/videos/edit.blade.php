@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <span>
                            <h1>{{ __('EDIT VIDEO') }}</h1>
                        </span>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <a href="/user_videos" class="btn btn-danger x-mark" style="margin-top: 20px; margin-right: 10px;">
                            <span class="x-mark-letter" aria-hidden="true">X</span>
                        </a>
                    </div>
                </div>

                <div class="card-body d-flex flex-column">
                    <form action="{{ route('videos.update', $video) }}" method="POST" class="flex-grow-1">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="uv_title">{{ __('Title:') }}</label>
                            <input type="text" name="uv_title" id="uv_title" value="{{ $video->videos_title }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="uv_description">{{ __('Description:') }}</label>
                            <textarea name="uv_description" id="uv_description" rows="4" class="form-control">{{ $video->videos_description }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>{{ __('Tags') }}</label><br>
                            @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->name }}" id="tag_{{ $tag->id }}" @if(in_array($tag->name, $video_tags->pluck('name')->toArray())) checked @endif>
                                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection