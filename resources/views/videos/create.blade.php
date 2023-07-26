@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h1> {{ __('UPLOAD VIDEO') }}</h1>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="/user_videos" class="btn btn-danger x-mark" style="margin-top: 20px; margin-right: 10px;">
                                <span class="x-mark-letter" aria-hidden="true">X</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="uv_video">{{ __('Video File') }}</label>
                            <input type="file" class="form-control" id="uv_video" name="uv_video" accept="video/mp4">
                            @error('uv_video')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uv_title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="uv_title" name="uv_title" value="{{ old('uv_title') }}">
                            @error('uv_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uv_description">{{ __('Description') }}</label>
                            <textarea class="form-control" id="uv_description" name="uv_description" rows="3">{{ old('uv_description') }}</textarea>
                            @error('uv_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Tags') }}</label><br>
                            @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->name }}" id="tag_{{ $tag->id }}">
                                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">{{ __('Thumbnail') }}</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/jpeg, image/png">
                            @error('thumbnail')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection