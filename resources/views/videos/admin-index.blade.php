@extends('layouts.app')
@extends('layouts.nav-admin')
@extends('layouts.sideadmin')
@section('content')

<div class="container mt-3">

    <table class="table table-dark">
        <thead>
            <tr>
                <th>Title</th>
                <th>Likes</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $perPage = 7;
            $currentPage = request()->get('page', 1);
            $startIndex = ($currentPage - 1) * $perPage;
            $videosChunk = $videos->slice($startIndex, $perPage);
            @endphp
            @foreach($videos as $video)
            <tr>
                <td>
                    <a href="{{ route('videos.show-admin', $video) }}" style="text-decoration: none !important; color:green;">{{ $video->videos_title }}</a>
                </td>
                <td>{{ $video->likes_count }}</td>
                <td>{{ $video->views }}</td>
                <td>
                    <form action="{{ route('videos.destroy', $video) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?')">Delete</button>    
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-8">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @php
                    $totalPages = ceil($videos->count() / $perPage);
                    @endphp

                    @for ($page = 1; $page <= $totalPages; $page++) <li class="page-item @if ($page == $currentPage) active @endif">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-dark"><a href="{{ route('videos.admin-index', ['sort' => 'likes']) }}" style="text-decoration: none !important; color:green;"><b>Sort by Likes</b></a><br></button> <a href="{{ route('videos.admin-index', ['sort' => 'likes']) }}">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-dark"><a href="{{ route('videos.admin-index', ['sort' => 'views']) }}" style="text-decoration: none !important; color:green;"><b>Sort by Views</b></a></button>
        </div>
    </div>

</div>
@endsection