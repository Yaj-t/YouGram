@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-0">
                    <video controls class="video embed-responsive-item" style="width: 100%; max-height: 480px;">
                        <source src="{{ $video->video_path }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="card-body">
                    <div class="video-info mt-4" style="color: white;">
                        <div class="video-title mb-2 text-md-right">
                            <h2>{{ $video->videos_title }}</h2>
                        </div>
                        <div class="row justify-content-between align-items-center mb-2">
                            <div class="col-md-6 text-md-left">
                                <img src="{{ asset($video->user->image) }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
                                {{ $video->user->name }}
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3 text-md-right">
                                @if (auth()->check())
                                @if (auth()->user()->likes->contains('video_id', $video->id))
                                <div class="btn-group" role="group" aria-label="Like and Subscribe">
                                    <form action="{{ route('unlike', $video) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Unlike</button>
                                    </form>
                                </div>
                                @else
                                <div class="btn-group" role="group" aria-label="Like and Subscribe">
                                    <form action="{{ route('like', $video) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Like</button>
                                    </form>
                                </div>
                                @endif

                                <!-- Subscribe/Unsubscribe buttons -->
                                <div class="btn-group ml-2" role="group" aria-label="Subscribe">
                                    @if (auth()->user()->id !== $video->user->id)
                                    @if (auth()->user()->isSubscribedTo($video->user))
                                    <form action="{{ route('unsubscribe', $video->user) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Unsubscribe</button>
                                    </form>
                                    @else
                                    <form action="{{ route('subscribe', $video->user) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </form>
                                    @endif
                                    @endif
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="card" style="background-color: #24272C;">
                            <div class="views-likes mb-2">
                                <span>Views: {{ $video->views }}</span>
                                <span>&nbsp;&middot;&nbsp;</span>
                                <span>Likes: {{ $video->likes->count() }}</span>
                            </div>
                            <div class="video-description mt-2">
                                {{ $video->videos_description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection