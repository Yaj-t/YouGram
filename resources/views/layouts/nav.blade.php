
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
                                        <!-- Middle of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">Search</button>
                            </form>
                        </li>
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