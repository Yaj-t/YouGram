@section('categories')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 style="font-weight: bold;">Programming Categories</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-2">
                        <a href="{{ route('videos.tag', 'cplusplus') }}">
                            <img src="{{ asset('images/logo-Cplusplus.jpg') }}" alt="C++">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('videos.tag', 'csharp') }}">
                            <img src="{{ asset('images/logo-Csharp.jpg') }}" alt="C#">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('videos.tag', 'mysql' ) }}">
                            <img src="{{ asset('images/logo-mysql.jpg') }}" alt="MySQL">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('videos.tag', 'php' ) }}">
                            <img src="{{ asset('images/logo-php.jpg') }}" alt="PHP">
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('videos.tag', 'swift') }}">
                            <img src="{{ asset('images/logo-swift.jpg') }}" alt="Swift">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection