<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container" style="color:white;">
        <h1>{{ $user->name }}'s Profile</h1>

        {{-- Display user information or additional details here --}}
        {{-- For example: --}}
        <p>Email: {{ $user->email }}</p>

        <h2>Videos</h2>
        <ul>
            @foreach ($videos as $video)
                <li>{{ $video->videos_title }}</li>
            @endforeach
        </ul>

        <h2>Subscribers</h2>
        <ul>
            @foreach ($subscribers as $subscriber)
                <li>{{ $subscriber->name }}</li>
            @endforeach
        </ul>

        <h2>Subscriptions</h2>
        <ul>
            @foreach ($subscriptions as $subscription)
                <li>
                    {{ $subscription->name }}
                    <form action="{{ route('unsubscribe', $subscription) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unsubscribe</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <h2>Liked Videos</h2>
        <ul>
            @foreach ($likedVideos as $likedVideo)
                <li>{{ $likedVideo->video->videos_title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
