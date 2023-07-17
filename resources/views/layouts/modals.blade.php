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
<div id="Upload" class="col-4 profile-Container" style="display: none; background-color:#24272C;">
        <div class="card" style="background-color:#24272C;">

            <div class="card-header" style="color: white">
                Upload Video
                <button type="button" class="btn btn-danger x-mark" onclick="cancelUpload()">
                    <span class="x-mark-letter" aria-hidden="true">X</span>
                </button>
            </div>

            <div class="card-body">

                @auth
                <form action="{{ route('videos.store')}}" method="POST" enctype="multipart/form-data" onsubmit="disableButton()">
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