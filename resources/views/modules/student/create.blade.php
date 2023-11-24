@extends('layouts/app/contentNavbarLayout')

@section('title', 'Add Student')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">ADD NEW STUDENT</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">school id</label>
                                    <input type="text" name="school_id" value="{{ $school_id }}" readonly
                                        class="form-control @error('school_id') is-invalid @enderror">
                                    @error('school_id')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">admission date</label>
                                    <input type="date" name="admission_date"
                                        value="{{ old('admission_date') ?? date('Y-m-d') }}"
                                        class="form-control @error('admission_date') is-invalid @enderror">
                                    @error('admission_date')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Grade Level</label>
                                    <select name="year_level"
                                        class="form-control @error('year_level') is-invalid @enderror">
                                        <option value="">--Please Select--</option>
                                        <option value="11" @selected(old('year_level' == '11'))>11</option>
                                        <option value="12" @selected(old('year_level' == '12'))>12</option>
                                    </select>
                                    @error('year_level')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="firstname"
                                        class="form-control @error('firstname') is-invalid @enderror"
                                        value="{{ old('firstname') }}">
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
                                    <input type="text" name="middlename"
                                        class="form-control @error('middlename') is-invalid @enderror"
                                        value="{{ old('middlename') }}">
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
                                    <input type="text" name="lastname"
                                        class="form-control @error('lastname') is-invalid @enderror"
                                        value="{{ old('lastname') }}">
                                    @error('lastname')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">SUFFIX Name</label>
                                    <select type="text" name="suffix"
                                        class="form-control @error('suffix') is-invalid @enderror">
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected(old('suffix') == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                    @error('suffix')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">gender</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected(old('gender') == $genders)>
                                                {{ $genders }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate"
                                        class="form-control @error('birthdate') is-invalid @enderror" required
                                        value="{{ old('birthdate') }}">
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
                                    <input type="number" name="age" id="age" class="form-control" readonly>
                                    @error('age')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }} ">
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
                                        <input type="text" name="contact" pattern="[0-9]{10}"
                                            placeholder="9xxxxxxxxx"
                                            class="form-control @error('contact') is-invalid @enderror"
                                            value="{{ old('contact') }} ">
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
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value={{ old('email') }}>
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
                        <a href="{{ route('student.index') }}" class="btn btn-danger me-2">CANCEL</a>
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script>
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
    </script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
