@extends('layouts/app/contentNavbarLayout')

@section('title', 'AGVTFI - My Profile')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h3 class="card-title mb-0 text-uppercase">My Profile</h3>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <x-success></x-success>
                    <x-errors></x-errors>
                    <div class="row d-flex justify-content-between p-3 m-2">
                        <div class="col-md-7 d-flex flex-column rounded rounded-2xl shadow p-3 mb-4">
                            <h5>Personal Information</h5>
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center align-items-center">
                                    <form action="{{ route('profile.changeProfile') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="text-center">
                                            @if ($profile)
                                                <img src="/images/user-upload/{{ $profile->image }}" alt=""
                                                    data-image="{{ $profile->image }}" id="preview"
                                                    class="rounded img-thumbnail rounded rounded-circle mx-auto"
                                                    style="height: 200px; width: 200px;">
                                            @else
                                                <img src="{{ asset('assets/img/avatars/def.png') }}" alt=""
                                                    id="preview"
                                                    class="rounded img-thumbnail rounded rounded-circle mx-auto"
                                                    style="height: 200px; width: 200px;">
                                            @endif
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Profile picture</label>
                                            <input type="file" name="image"
                                                class="form-control  @error('image') is-invalid @enderror"
                                                value="{{ old('image') }}" id="image" required>
                                            @error('image')
                                                <div class="invalid-feedback" style="display: inline-block !important;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <button class="btn btn-primary " type="submit">Change Profile
                                                Picture</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating  mb-2 px-2">
                                        <input type="text" class="form-control" id="" readonly
                                            placeholder="name@example.com" value="{{ $user->firstname }}">
                                        <label class="ms-2 fw-bold" for="">Firstname</label>
                                    </div>
                                    <div class="form-floating  mb-2 px-2">
                                        <input type="text" class="form-control" id="" readonly
                                            placeholder="name@example.com" value="{{ $user->middlename }}">
                                        <label class="ms-2 fw-bold" for="">Middlename</label>
                                    </div>
                                    <div class="form-floating  mb-2 px-2">
                                        <input type="text" class="form-control" id="" readonly
                                            placeholder="name@example.com" value="{{ $user->lastname }}">
                                        <label class="ms-2 fw-bold" for="">Lastname</label>
                                    </div>
                                    <div class="form-floating  mb-2 px-2">
                                        <input type="text" class="form-control" id="" readonly
                                            placeholder="name@example.com" value="{{ $user->suffix ?? 'n/a' }}">
                                        <label class="ms-2 fw-bold" for="">Suffix</label>
                                    </div>
                                    <div class="form-floating mb-2 px-2">
                                        <input type="email" class="form-control" id="" readonly
                                            placeholder="name@example.com" value="{{ $user->email }}">
                                        <label class="ms-2 fw-bold" for="">Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column rounded rounded-2xl shadow p-3">
                            <h5>Change Password</h5>
                            <form action="{{ route('profile.changePassword', $user) }}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="" name="old_password"
                                            required placeholder="***********">
                                        <label class="ms-2 fw-bold" for="">Old Password</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="" name="password" required
                                            placeholder="***********">
                                        <label class="ms-2 fw-bold" for="">Password</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" class="form-control" id="" required
                                            name="password_confirmation" placeholder="***********">
                                        <label class="ms-2 fw-bold" for="">Password Confirmation</label>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary " type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
        var imageInput = document.querySelector('#image');
        imageInput.addEventListener('change', previewImage);
    </script>
    <script>
        // Get the image element
        const image = document.getElementById('preview');
        // Get the data-image attribute value (the image filename)
        const imageName = image.getAttribute('data-image');
        // Check if the image exists
        const imageExists = new Image();
        imageExists.onload = function() {
            // Image exists, set the src attribute to the original path
            image.src = `/images/user-upload/${imageName}`;
        };
        imageExists.onerror = function() {
            // Image doesn't exist, set the src attribute to the default image path
            image.src = '/assets/img/avatars/def.png';
        };
        // Set the source of the imageExists to trigger the load or error event
        imageExists.src = `/images/user-upload/${imageName}`;
    </script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
