@extends('layouts.app')

@section('content')
<div class="mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: #24272C; color: white; margin-top: -50px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h1>{{ old('name', $user->name) }}'s Profile</h1>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('users-admin') }}" class="btn btn-danger x-mark" style="margin-top: 20px; margin-right: 10px;">
                                <span class="x-mark-letter" aria-hidden="true">X</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form>

                        <div class="mb-3 row">
                            <img src="{{ asset($user->image) }}" alt="User Image" style="width: 175px; height: 150px; border-radius: 50%;">
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" readonly style="background-color: #33363C; color: white;">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" readonly style="background-color: #33363C; color: white;">
                            </div>
                        </div>

                        <!-- Display created_at and updated_at information as read-only text inputs -->
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="created_at" class="col-form-label text-md-end">{{ __('Created At') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="created_at" type="text" class="form-control" value="{{ $user->created_at }}" readonly style="background-color: #33363C; color: white;">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="updated_at" class="col-form-label text-md-end">{{ __('Updated At') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="updated_at" type="text" class="form-control" value="{{ $user->updated_at }}" readonly style="background-color: #33363C; color: white;">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection