@extends('layouts.app')
@extends('layouts.nav-admin')
@extends('layouts.sideadmin')
@section('content')
    <h1 style="color: aliceblue;"><i>All Videos</i></h1>
    <div>
        <button type="button" class="btn btn-dark"><a href="{{ route('videos.admin-index', ['sort' => 'likes']) }}"><b>Sort by Likes</b></a><br></button> <a href="{{ route('videos.admin-index', ['sort' => 'likes']) }}">
            <button type="button" class="btn btn-dark"><a href="{{ route('videos.admin-index', ['sort' => 'views']) }}"><b>Sort by Views</b></a></button>
    </div>
    <div class="container mt-3">
        <table class="table table-dark">
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
                    <td>
                    <a href="{{ route('videos.show', $video) }}">{{ $video->videos_title }}</a></td>
                    <td>{{ $video->videos_description }}</td>
                    <td>{{ $video->likes_count }}</td>
                    <td>{{ $video->views }}</td>
                    <td>
                        @foreach($video->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('videos.edit', $video) }}">
                            <button type="button" class="btn btn-primary" style="margin-bottom: 5px;">Edit</button>
                        </a>
                        <form action="{{ route('videos.destroy', $video) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

