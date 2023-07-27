@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile-image-wrapper">
                                <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image" style="width: 100px; height: 90px; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1>{{ $user->name }}'s Profile</h1>
                            <h4>{{ $user->email }}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('videos.index') }}" class="btn btn-danger x-mark" style="margin-top: 20px; margin-right: 10px;">
                                <span class="x-mark-letter" aria-hidden="true">X</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="color: white;">

                    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="videos-tab" data-bs-toggle="tab" href="#videosContent" role="tab" aria-controls="videosContent" aria-selected="true" style="color: green;">Videos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="subscribers-tab" data-bs-toggle="tab" href="#subscribersContent" role="tab" aria-controls="subscribersContent" aria-selected="false" style="color: green;">Subscribers</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="subscriptions-tab" data-bs-toggle="tab" href="#subscriptionsContent" role="tab" aria-controls="subscriptionsContent" aria-selected="false" style="color: green;">Subscriptions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="likedVideos-tab" data-bs-toggle="tab" href="#likedVideosContent" role="tab" aria-controls="likedVideosContent" aria-selected="false" style="color: green;">Liked Videos</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <div class="tab-pane fade show active" id="videosContent" role="tabpanel" aria-labelledby="videos-tab">
                            <div class="section-container" style="background-color: #24272C; padding: 10px;">
                                @if ($videos->isEmpty())
                                <p>NONE</p>
                                @else
                                <ol>
                                    @foreach ($videos as $video)
                                    <li style="padding: 10px;"><a href="{{ route('videos.show', $video) }}" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: green;">{{ $video->videos_title }}</a></li>
                                    @endforeach
                                </ol>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="subscribersContent" role="tabpanel" aria-labelledby="subscribers-tab">
                            <div class="section-container" style="background-color: #24272C; padding: 10px;">
                                @if($subscribers->isEmpty())
                                <p class="text-center">NONE</p>
                                @else
                                <div class="row">
                                    @foreach ($subscribers as $subscriber)
                                    <div class="col-md-3 text-center">
                                        @php
                                        // Check if a user with the same name exists in the 'users' table
                                        $userWithSameName = \App\Models\User::where('name', $subscriber->name)->first();
                                        @endphp
                                        @if($userWithSameName)
                                        <img src="{{ asset($userWithSameName->image) }}" alt="{{ $subscriber->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @else
                                        <!-- If user with the same name doesn't exist, show a default image or handle it as needed -->
                                        <img src="{{ asset('path_to_default_image.jpg') }}" alt="{{ $subscriber->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                        <p>{{ $subscriber->name }}</p>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="subscriptionsContent" role="tabpanel" aria-labelledby="subscriptions-tab">
                            <div class="section-container" style="background-color: #24272C; padding: 10px;">
                                @if($subscriptions->isEmpty())
                                <p class="text-center">NONE</p>
                                @else
                                <div class="row">
                                    @foreach ($subscriptions as $subscription)
                                    <div class="col-md-3 text-center">
                                        @php
                                        // Check if a user with the same name exists in the 'users' table
                                        $userWithSameName = \App\Models\User::where('name', $subscription->name)->first();
                                        @endphp
                                        @if($userWithSameName)
                                        <a href="{{ route('videos-user', $subscription) }}">
                                            <img src="{{ asset($userWithSameName->image) }}" alt="{{ $subscription->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        </a>
                                        @else
                                        <!-- If user with the same name doesn't exist, show a default image or handle it as needed -->
                                        <img src="{{ asset('path_to_default_image.jpg') }}" alt="{{ $subscription->name }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                        <p>{{ $subscription->name }}</p>
                                        <form action="{{ route('unsubscribe', $subscription) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="margin-top: -15px;">Unsubscribe</button>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="likedVideosContent" role="tabpanel" aria-labelledby="likedVideos-tab">
                            <div class="section-container" style="background-color: #24272C; padding: 10px;">
                                @if($likedVideos->isEmpty())
                                <p>NONE</p>
                                @else
                                <ol>
                                    @foreach ($likedVideos as $likedVideo)
                                    <li style="padding: 10px;"><a href="{{ route('videos.show', $likedVideo) }}" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: green;">{{ $likedVideo->videos_title }}</a></li>
                                    @endforeach
                                </ol>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new bootstrap.Tab(document.getElementById('profileTabs'));
    });
</script>