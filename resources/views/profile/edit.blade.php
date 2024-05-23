@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">Edit Profile</h1>
        <div class="col-lg-8">
            <form action="/profile/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="{{ old('username', auth()->user()->username) }}">
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
                <div class="mb-5">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-dark">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script> --}}

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
        // document.addEventListener('DOMContentLoaded', () => {
        //     let cropper;
        //     const profilePictureInput = document.getElementById('profile_picture');
        //     const imagePreview = document.getElementById('image-preview');

        //     profilePictureInput.addEventListener('change', (event) => {
        //         const file = event.target.files[0];
        //         if (file && file.type.startsWith('image/')) {
        //             const reader = new FileReader();
        //             reader.onload = (e) => {
        //                 imagePreview.innerHTML =
        //                     `<img id="cropper-image" src="${e.target.result}" class="img-fluid"/>`;
        //                 const cropperImage = document.getElementById('cropper-image');
        //                 cropper = new Cropper(cropperImage, {
        //                     aspectRatio: 1,
        //                     viewMode: 1,
        //                     autoCropArea: 1,
        //                 });
        //             };
        //             reader.readAsDataURL(file);
        //         } else {
        //             imagePreview.innerHTML = '';
        //         }
        //     });

        //     document.querySelector('form').addEventListener('submit', (event) => {
        //         event.preventDefault();
        //         if (cropper) {
        //             cropper.getCroppedCanvas().toBlob((blob) => {
        //                 const formData = new FormData(event.target);
        //                 // Remove the existing profile_picture field from FormData
        //                 formData.delete('profile_picture');
        //                 // Append the cropped image blob as profile_picture
        //                 formData.append('profile_picture', blob, 'profile_picture.png');
        //                 fetch('/profile/update', {
        //                     method: 'POST',
        //                     body: formData,
        //                     headers: {
        //                         'X-CSRF-TOKEN': document.querySelector(
        //                             'meta[name="csrf-token"]').getAttribute('content')
        //                     }
        //                 }).then(response => response.json()).then(data => {
        //                     if (data.success) {
        //                         window.location.href = '/profile';
        //                     } else {
        //                         alert('Update failed');
        //                     }
        //                 }).catch(error => console.error('Error:', error));
        //             });
        //         } else {
        //             event.target.submit();
        //         }
        //     });
        // });
    </script>
@endsection
