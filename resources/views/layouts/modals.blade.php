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