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
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #24272C;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/yougram-high-resolution-logo-color-on-transparent-background.png') }}" style="max-width: 150px; max-height: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <!-- Adding profile Image -->
                        <a id="profileImage" class="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="profile-image-wrapper">
                                <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image">
                            </div>
                        </a>

                        <!-- Edit Profile and Logout -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="background-color: #24272C" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" style="color: white;" onclick="toggleProfileEdit();">
                                    {{ __('Edit Profile') }}
                                </a>
                                <a class="dropdown-item" href="#" style="color: white;" onclick="toggleProfileEdit2();">
                                    {{ __('Upload Video') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" style="color: white;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('sidebar');
        <main class="py-4" style="margin: 25px auto; ">
            @yield('content')
        </main>

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



    <!-- Upload Video -->
    <div id="editProfileContainer2" class="col-4 profile-Container" style="display: none; background-color:#24272C;">
        <div class="card" style="background-color:#24272C;">

            <div class="card-header" style="color: white">
                Upload Video
                <button type="button" class="btn btn-danger x-mark" onclick="cancelEdit2()">
                    <span class="x-mark-letter" aria-hidden="true">X</span>
                </button>
            </div>

            <div class="card-body">

                @auth
                <form action="{{ route('videos.insert', ['user' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm d-flex justify-content-center">
                            <input type="file" name="uv_video" id="video" class="form-control" style="width: 50%;" accept="video/mp4">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                            <input type="text" name="uv_title" placeholder="Title" class="form-control" id="inputid">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <textarea name="uv_description" placeholder="Description" class="form-control" id="inputid" style="height: 100px;"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="row mb-3">
                            <div class="col-sm">
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="php" value="php" class="form-check-input">
                                    PHP
                                </label>
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="cplusplus" value="c++" class="form-check-input">
                                    C++
                                </label>
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="mysql" value="mysql" class="form-check-input">
                                    MySQL
                                </label>
                            </div>
                            <div class="col-sm">
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="swift" value="swift" class="form-check-input">
                                    Swift
                                </label>
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="csharp" value="c#" class="form-check-input">
                                    C#
                                </label>
                                <label class="form-check" style="color: white;">
                                    <input type="checkbox" name="others" value="others" class="form-check-input">
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm d-flex justify-content-center">
                            <button type="submit" name="uploadVideo" class="btn btn-primary" style="width: 50%;"> {{ __('UPLOAD') }}
                            </button>
                        </div>
                    </div>
                </form>
                @endauth
            </div>
        </div>
    </div>

</body>

</html>
