<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('navbar.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('yougram.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('custom.js') }}"></script>

    <style>
        body {
            margin: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            line-height: inherit;
            background-color: #0B0E0F;
        }
    </style>
</head>

<body>
    <div id="app">
        @yield('sidebar')
        

        <main class="py-4" style="margin: 40px auto 0 auto; background-color: #0B0E0F;">
            <div class="container trends-home" style="margin-right: 25px;">
                @yield('categories')
                @yield('content')
            </div>
        </main>
        @yield('login')
        @yield('register')
    </div>
    <!-- Edit Profile -->
    <div id="editProfileContainer" class="col-4 profile-Container" style="display: none; background-color:#24272C;">
        <div class="card" style="background-color:#24272C;">

            <div class="card-header" style="color: white">
                Edit User
                <button type="button" class="btn btn-danger x-mark" onclick="cancelEdit()">
                    <span class="x-mark-letter" aria-hidden="true">X</span>
                </button>
            </div>

            <div class="card-body">
                @auth
                <form action="{{ route('users.update', ['user' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <a id="profileImage" class="row justify-content-center mb-3" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <div class="col-sm-auto profile-image-second-wrapper">
                            <img src="{{ Auth::check() ? asset(Auth::user()->image) : '' }}" alt="Profile Image">
                        </div>
                    </a>
                    <div class="row mb-3">
                        <div class="col-sm d-flex justify-content-center">
                            <input type="file" name="up_image" id="image" class="form-control" style="width: 50%;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <input type="text" name="name" placeholder="{{ Auth::check() ? Auth::user()->name : '' }}" class="form-control" id="inputid">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <input type="email" name="email" placeholder="{{ Auth::check() ? Auth::user()->email : '' }}" class="form-control" id="inutname">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm d-flex justify-content-center">
                            <button type="submit" name="updateProfile" class="btn btn-primary" style="width: 50%;"> {{ __('UPDATE') }}
                            </button>
                        </div>
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </div>
    @extends('layouts.modals')
</body>
</html>