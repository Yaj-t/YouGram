@extends('layouts.app')
@extends('layouts.nav-admin')
@extends('layouts.sideadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $perPage = 7;
                    $currentPage = request()->get('page', 1);
                    $startIndex = ($currentPage - 1) * $perPage;
                    $usersChunk = $users->slice($startIndex, $perPage);
                    @endphp
                    @foreach($usersChunk as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="width: 100px;">
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button class="btn btn-primary" style="margin-bottom:5px;">Expand</button>
                            </a>
                        </td>
                        <td style="width: 100px;">
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @php
                    $totalPages = ceil($users->count() / $perPage);
                    @endphp

                    @for ($page = 1; $page <= $totalPages; $page++) <li class="page-item @if ($page == $currentPage) active @endif">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                        </li>
                        @endfor
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection