@extends('layouts/app/contentNavbarLayout')

@section('title', 'VIEW TEACHER INFORMATION')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <form enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">VIEW TEACHER PERSONAL INFORMATION</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">school id</label>
                                    <input type="text" name="school_id" value="{{ $teacher->school_id }}" readonly
                                        class="form-control">
                                    @error('school_id')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control" readonly
                                        value="{{ $teacher->firstname }}">
                                    @error('firstname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Middle Name</label>
                                    <input type="text" name="middlename" value="{{ $teacher->middlename }}" readonly
                                        class="form-control">
                                    @error('middlename')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" value="{{ $teacher->lastname }}" readonly
                                        class="form-control">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">SUFFIX</label>
                                    <select name="suffix" class="form-control" disabled>
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected($teacher->suffix == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">gender</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                        disabled required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected($teacher->gender == $genders)>
                                                {{ $genders }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">birthdate</label>
                                    <input type="date" name="birthdate"
                                        value="{{ $teacher->birthdate->format('Y-m-d') }}" required id="birthdate" readonly
                                        class="form-control @error('birthdate') is-invalid @enderror">
                                    @error('birthdate')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">age</label>
                                    <input type="number" name="age" value="{{ $teacher->age }}" id="age"
                                        class="form-control @error('age') is-invalid @enderror" required readonly>
                                    @error('age')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">address</label>
                                    <input type="text" name="address" value="{{ $teacher->address }}"
                                        class="form-control @error('address') is-invalid @enderror" readonly>
                                    @error('address')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">contact number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="text" pattern="{0-9}[10]" name="contact"
                                            value="{{ $teacher->contact_number }}"
                                            class="form-control @error('contact') is-invalid @enderror" readonly>
                                    </div>
                                    @error('contact')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">e-mail</label>
                                    <input type="email" name="email" value="{{ $teacher->email }}"
                                        class="form-control @error('email') is-invalid @enderror" readonly>
                                    @error('email')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end d-flex">
                        <a href="{{ route('teacher.index') }}" class="btn btn-info me-2">GO BACK</a>
                        {{-- <button type="submit" class="btn btn-info">UPDATE</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#birthdate').on('input', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#age').val(age);
            });
        });

        const contactInput = document.querySelector('input[name="contact"]');

        contactInput.addEventListener('input', function() {
            if (this.value.length != 10 || isNaN(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    </script> --}}
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
