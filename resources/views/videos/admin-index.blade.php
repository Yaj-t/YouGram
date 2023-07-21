@extends('layouts.app')
@extends('layouts.nav-admin')
@extends('layouts.sideadmin')
@section('content')
    <h1>All Videos</h1>
    <div>
        <a href="{{ route('videos.admin-index', ['sort' => 'likes']) }}">Sort by Likes</a>
        <a href="{{ route('videos.admin-index', ['sort' => 'views']) }}">Sort by Views</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Likes</th>
                <th>Views</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
                <tr>
                    <td>{{ $video->videos_title }}</td>
                    <td>{{ $video->videos_description }}</td>
                    <td>{{ $video->likes_count }}</td>
                    <td>{{ $video->views }}</td>
                    <td>
                        @foreach($video->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('videos.edit', $video) }}">Edit</a>
                        <form action="{{ route('videos.destroy', $video) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
