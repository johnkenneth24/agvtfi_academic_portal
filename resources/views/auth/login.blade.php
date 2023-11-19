@extends('layouts/auth-app/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">

    <style>
        .container-xxl {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(6, 6, 6, 0.5)), url("{{ asset('assets/img/login-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y ">
            <div class="col-md-4">
                <!-- Register -->
                <div class="card"
                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2 d-flex flex-column">
                                <img src="{{ asset('assets/img/backgrounds/bg.png') }}" height="150" alt="">
                                <h5 class="text-primary"><strong>AGVTFI ACADEMIC PORTAL</strong></h5>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <p class="mb-1 mt-2">Sign in to your account to log in.</p>
                        <form id="formAuthentication" class="mb-3" action="{{ route('auth.verify') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">school id</label>
                                <input type="text" class="form-control" id="email" name="school_id"
                                    placeholder="Enter your School ID" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                @error('school_id')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>
@endsection
