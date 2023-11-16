@extends('layouts/app/contentNavbarLayout')

@section('title', 'Add Student')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-label">school id</label>
                                    <input type="text" name="school_id" value="{{ $student->school_id }}" id=""
                                        class="form-control">
                                    @error('school_id')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">admission date</label>
                                    <input type="date" name="admission_date" id="" value="{{ $student->admission_date->format('Y-m-d') }}" class="form-control">
                                    @error('admission_date')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for="" class="form-label">Grade Level</label>
                                  <select name="year_level" id="" class="form-control">
                                    <option value="">--Please Select--</option>
                                    @for ($i = 11; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                  @error('admission_date')
                                      <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                          </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="firstname" id="" value="{{ $student->firstname }}" class="form-control">
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
                                    <input type="text" name="middlename" value="{{ $student->middlename }}" id="" class="form-control">
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
                                    <input type="text" name="lastname" value="{{ $student->lastname }}" id="" class="form-control">
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
                                    <input type="text" name="suffix" id="" value="{{ $student->suffix }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @foreach ($gender as $genders)
                                            <option value="{{ $genders }}">{{ $genders }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">birthdate</label>
                                    <input type="date" name="birthdate" id="" class="form-control">
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
                                    <input type="number" name="age" id="" class="form-control">
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
                                    <input type="text" name="address" id="" class="form-control">
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
                                    <input type="number" name="contact" id="" class="form-control">
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
                                    <input type="email" name="email" id="" class="form-control">
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
