@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #24272C;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h1> {{ $user->name }}'s Subscriptions </h1>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('videos.index') }}" class="btn btn-danger x-mark" style="margin-top: 20px; margin-right: 10px;">
                                <span class="x-mark-letter" aria-hidden="true">X</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="color: white;">
                    <div class="section-container" style="background-color: #24272C; padding: 10px;">
                        @if($subscriptions->isEmpty())
                        <p class="text-center">NONE</p>
                        @else
                        @foreach ($subscriptions as $subscription)
                        <div class="row mb-3">
                            <div class="col-md-9 d-flex align-items-center">
                                @php
                                // Check if a user with the same name exists in the 'users' table
                                $userWithSameName = \App\Models\User::where('name', $subscription->name)->first();
                                @endphp
                                @if($userWithSameName)
                                <img src="{{ asset($userWithSameName->image) }}" alt="{{ $subscription->name }}" class="img-fluid" style="border-radius: 50%; height: 50px; width: 50px;">
                                @else
                                <!-- If user with the same name doesn't exist, show a default image or handle it as needed -->
                                <img src="{{ asset('path_to_default_image.jpg') }}" alt="{{ $subscription->name }}" class="img-fluid" style="border-radius: 50%;">
                                @endif
                                <p style="margin-left: 15px;">{{ $subscription->name }}</p>
                            </div>
                            <div class="col-md-3 text-center align-self-center">
                                <form action="{{ route('unsubscribe', $subscription) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Unsubscribe</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection