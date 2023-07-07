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
    <script>
        function toggleProfileEdit() {

            var overlay = document.createElement("div");
            overlay.classList.add("dark-overlay");
            document.body.appendChild(overlay);

            document.getElementById("editProfileContainer").style.display = "block";
            document.body.style.overflow = "hidden"; // Disable scrolling on the page

        }

        function cancelEdit() {
            var overlay = document.querySelector(".dark-overlay");
            if (overlay) {
                overlay.parentNode.removeChild(overlay);
            }

            document.getElementById("editProfileContainer").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling on the page
            document.body.style.backgroundColor = "transparent"; // Reset the background color
        }
    </script>


    <style>
        body {
            margin: 0;
            background-image: url('images/login_and_register_background.jpg');
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
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #B18E6B;">
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" onclick="toggleProfileEdit();">
                                    {{ __('Edit Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Edit Profile -->
    <div id="editProfileContainer" class="col-4 profile-Container" style="display: none;">
        <div class="card">

            <div class="card-header">
                Add student
                <button type="button" class="btn btn-danger x-mark" onclick="cancelEdit()">
                    <span class="x-mark-letter" aria-hidden="true">X</span>
                </button>
            </div>

            <div class="card-body">
                @auth
                <form action="{{ route('users.update', ['user' => Auth::user()->id]) }}" method="POST">
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

</body>

</html>