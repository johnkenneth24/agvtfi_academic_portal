@extends('layouts/app/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">school id</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">admission date</label>
              <input type="date" name="" id="" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">First Name</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">Middle Name</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">Last Name</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="" class="form-label">SUFFIX Name</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="form-label">gender</label>
              <input type="text" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="form-label">birthdate</label>
              <input type="date" name="" id="" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="form-label">age</label>
              <input type="number" name="" id="" class="form-control">
            </div>
          </div>
        </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="form-label">address</label>
                <input type="text" name="" id="" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="form-label">contact number</label>
                <input type="number" name="" id="" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="form-label">e-mail</label>
                <input type="email" name="" id="" class="form-control">
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
@endsection
