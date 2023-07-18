@extends('layouts.app')

@section('content')
<div style="color:white;">
<h1>{{ $user->name }}'s Subscribers</h1>

@if ($subscribers->count() > 0)
    <ul>
        @foreach ($subscribers as $subscriber)
            <li>{{ $subscriber->name }}</li>
        @endforeach
    </ul>
@else
    <p>{{ $user->name }} has no subscribers.</p>
@endif
</div>
@endsection
