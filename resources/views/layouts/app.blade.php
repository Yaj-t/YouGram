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
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
    @yield('sidebar')
    <div id="app">
        <main class="py-4" style="margin: 60px auto 0 auto; background-color: #0B0E0F;">
            <div class="container trends-home" style="margin-right: 25px;">
                @yield('categories')
                @yield('content')
            </div>
        </main>
        @yield('login')
        @yield('register')
    </div>
    @extends('layouts.modals')

    @push('styles')
    <!-- Your custom styles, if any -->
    @endpush    
</body>
</html>