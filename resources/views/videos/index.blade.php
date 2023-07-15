@extends('layouts.nav')
@extends('layouts.side')

<head>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('yougram.css') }}">

    <style>
        body {
            background-image: none !important;
            background-color: #0B0E0F !important;
        }
    </style>
</head>
@section('content')

<body>
    <div class="container trends-home" style="margin-right: 25px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-weight: bold;">Programming Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a>
                                    <img src="{{ asset('images/logo-Cplusplus.jpg') }}" alt="C++">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a>
                                    <img src="{{ asset('images/logo-Csharp.jpg') }}" alt="C#">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a>
                                    <img src="{{ asset('images/logo-mysql.jpg') }}" alt="MySQL">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a>
                                    <img src="{{ asset('images/logo-php.jpg') }}" alt="PHP">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a>
                                    <img src="{{ asset('images/logo-swift.jpg') }}" alt="PHP">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container videos" style="margin-top: 20px;">
            <div class="row">
                @foreach ($videos as $video)
                <div class="col-md-4" style="margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $video->videos_title }}</h5>
                        </div>
                        <div class="card-body" style="position: relative; padding-bottom: 56.25%;">
                            <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <source src="{{ asset($video->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>






    </div>

    
</body>

@endsection
