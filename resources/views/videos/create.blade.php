<div class="modal fade" id="uploadVideoModal" tabindex="-1" role="dialog" aria-labelledby="uploadVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadVideoModalLabel">{{ __('Upload Video') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="uv_title">{{ __('Title') }}</label>
                        <input id="uv_title" type="text" class="form-control @error('uv_title') is-invalid @enderror" name="uv_title" value="{{ old('uv_title') }}" required autofocus>
                        @error('uv_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="uv_description">{{ __('Description') }}</label>
                        <textarea id="uv_description" class="form-control @error('uv_description') is-invalid @enderror" name="uv_description" required>{{ old('uv_description') }}</textarea>
                        @error('uv_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="uv_video">{{ __('Video') }}</label>
                        <input id="uv_video" type="file" class="form-control-file @error('uv_video') is-invalid @enderror" name="uv_video" required>
                        @error('uv_video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('Tags') }}</label><br>
                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}">
                                <label class="form-check-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
