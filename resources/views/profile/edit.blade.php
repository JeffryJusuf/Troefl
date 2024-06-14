@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/profile" class="text-decoration-none text-secondary">Profile</a>
            /
            <a href="/profile/edit" class="text-decoration-none text-secondary">Edit Profile</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">Edit Profile</h1>
        <div class="col-lg-8">
            <form action="/profile/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" value="{{ auth()->user()->username }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="hidden" name="oldImage" value="{{ auth()->user()->profile_picture }}">
                    @if (auth()->user()->profile_picture)
                        <img src="{{ auth()->user()->profile_picture_url }}"
                            class="img-preview img-fluid col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid col-sm-5">
                    @endif
                    <img class="img-preview img-fluid col-sm-5">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage()">
                    <small class="text-secondary">Make sure the ratio of the image is 1:1 or it will appear squished</small>
                    @error('profile_picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="old_password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" id="old_password"
                        name="old_password">
                    <small class="text-secondary">Only required if you want to change your password</small>
                    @error('old_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" id="password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="mb-5">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-dark">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#profile_picture');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
