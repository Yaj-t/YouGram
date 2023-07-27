@extends('layouts.app')
@extends('layouts.nav-admin')
@extends('layouts.sideadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="color: aliceblue;"><i>All Normal Users</i></h1><br>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button class="btn btn-primary" style="margin-bottom:5px;">Edit</button> 
                            </a>
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
        </div>
    </div>
</div>
@endsection