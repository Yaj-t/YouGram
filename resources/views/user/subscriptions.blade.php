@extends('layouts.app')

@section('content')
<div style="color:white;">
    <h1>{{ $user->name }}'s Subscriptions</h1>

    @if ($subscriptions->count() > 0)
        <ul>
            @foreach ($subscriptions as $subscription)
                <li>
                    {{ $subscription->name }}
                    <form action="{{ route('unsubscribe', $subscription->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Unsubscribe</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>{{ $user->name }} has no subscriptions.</p>
    @endif
</div>
@endsection
