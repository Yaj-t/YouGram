@extends('layouts.nav')
@extends('layouts.side')
@extends('layouts.categories')
@section('content')
        <div class="container videos" style="margin-top: 20px;">
            <div class="row">
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
