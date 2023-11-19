@extends('layouts/app/contentNavbarLayout')

@section('title', 'ADD NEW TEACHER')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<form action="{{ route('teacher.update', [$user]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-xxl-12">
          <div class="card p-2">`
              <div class="card-header py-0 d-flex justify-content-between align-items-center">
                  <div class="card-title">
                      <h5 class="card-title text-uppercase">UPDATE TEACHER PERSONAL INFORMATION</h5>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row g-2">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="" class="form-label">school id</label>
                              <input type="text" name="school_id" value="{{ $user->school_id }}" id=""
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
                              <input type="text" name="firstname" id="" class="form-control" value="{{ $user->firstname }}">
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
                              <input type="text" name="middlename" id="" value="{{ $user->middlename }}" class="form-control">
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
                              <input type="text" name="lastname" id="" value="{{ $user->lastname }}" class="form-control">
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
                              <input type="text" name="suffix"  value="{{ $user->suffix }}" id="" class="form-control">
                          </div>
                      </div>
                  </div>
                  <div class="row g-2 mt-2">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="" class="form-label">gender</label>
                              <select name="gender" id="" class="form-control">
                                  <option value="">--Please Select--</option>
                                  @foreach ($gender as $genders)
                                      <option value="{{ $genders }}" @selected($user->gender == $genders)>{{ $genders }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="" class="form-label">birthdate</label>
                              <input type="date" name="birthdate" value="{{ $user->birthdate->format('Y-m-d') }}" id="" class="form-control">
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
                              <input type="number" name="age" value="{{ $user->age }}" id="" class="form-control">
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
                              <input type="text" name="address" value="{{ $user->address }}" id="" class="form-control">
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
                              <input type="number" name="contact" value="{{ $user->contact_number }}" id="" class="form-control">
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
                              <input type="email" name="email" value="{{ $user->email }}" id="" class="form-control">
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
                  <button type="submit" class="btn btn-info">UPDATE</button>
              </div>
          </div>
      </div>
  </div>
</form>
@endsection
