@extends('layouts/app/contentNavbarLayout')

@section('title', 'Update Student Info')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <form action="{{ route('student.update', $student) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">UPDATE STUDENT INFORMATION</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">School ID</label>
                                    <input type="text" name="school_id" value="{{ $student->school_id }}" readonly
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
                                    <label for="" class="form-label">Admission Date</label>
                                    <input type="date" name="admission_date" required
                                        value="{{ $student?->admission_date?->format('Y-m-d') ?? '' }}"
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
                                    <select name="year_level" class="form-control @error('year_level') is-invalid @enderror"
                                        required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($student->studentYearLevel as $yearLevel)
                                            <option value="Grade 11" {{ $yearLevel->year_level == '11' ? 'selected' : '' }}>
                                                Grade 11
                                            </option>
                                            <option value="Grade 12" {{ $yearLevel->year_level == '12' ? 'selected' : '' }}>
                                                Grade 12
                                            </option>
                                        @endforeach
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
                                    <input type="text" name="firstname" value="{{ $student->firstname }}" required
                                        class="form-control @error('firstname') is-invalid @enderror">
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
                                    <input type="text" name="middlename" value="{{ $student->middlename }}"
                                        class="form-control @error('middlename') is-invalid @enderror">
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
                                    <input type="text" name="lastname" value="{{ $student->lastname }}" required
                                        class="form-control @error('lastname') is-invalid @enderror">
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
                                    <select name="suffix" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected($student->suffix == $suffix)>
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
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror"
                                        required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}" @selected($student->gender)>
                                                {{ $genders }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">birthdate</label>
                                    <input type="date" name="birthdate" required
                                        value="{{ $student->birthdate?->format('Y-m-d') ?? '' }}"
                                        class="form-control @error('birthdate') is-invalid @enderror" id="birthdate">
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
                                    <input type="number" name="age" required
                                        class="form-control @error('age') is-invalid @enderror" id="age"
                                        value="{{ $student->age }}" placeholder="0" readonly>
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
                                    <input type="text" name="address" value="{{ $student->address }}" required
                                        class="form-control @error('address') is-invalid @enderror">
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
                                        <input type="text" name="contact" pattern="{0-9}[10]" required
                                            value="{{ $student->contact_number }}"
                                            class="form-control @error('contact') is-invalid @enderror">
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
                                    <input type="email" name="email" value="{{ $student->email }}" required
                                        class="form-control @error('email') is-invalid @enderror">
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
    </script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
