@extends('layouts.app')
@extends('layouts.side')
@extends('layouts.nav')
@extends('layouts.categories')
@section('content')
    <h1>My Uploaded Videos</h1>

    @if ($videos->isEmpty())
        <p>No videos uploaded yet.</p>
    @else
        <ul>
            @foreach ($videos as $video)
                <li>
                    <h2>{{ $video->videos_title }}</h2>
                    <p>{{ $video->videos_description }}</p>
                    <a href="{{ route('videos.show', $video) }}">View</a>
                    <a href="{{ route('videos.edit', $video) }}">Edit</a>
                    <form action="{{ route('videos.destroy', $video) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
