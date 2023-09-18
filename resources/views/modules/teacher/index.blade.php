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
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="card-title mb-0 text-uppercase">TEACHER LIST</h5>
        </div>
        <div class="card-tools d-flex justify-content-end">
          <div class="col-md-6 me-2">
            <input type="text" class="form-control col-md-3" placeholder="Search...">
          </div>
          <a href="{{ route('teacher.create') }}" class="btn btn-info">ADD NEW TEACHER</a>
        </div>
      </div>
      <div class="card-body"> `
        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th>SCHOOL ID</th>
                <th>FULL NAME</th>
                <th>YEAR & SECTION</th>
                <th>E-MAIL</th>
                <th>Contact No.</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td style="font-size: 0.90rem;">0001</td>
                <td style="font-size: 0.90rem;">JUAN DELA CRUZ</td>
                <td style="font-size: 0.90rem;">7 - A</td>
                <td style="font-size: 0.90rem;">juandelacruz@agvtfi.com</td>
                <td style="font-size: 0.90rem;">09478521236</td>
                <td>
                  <a href="" class="btn btn-info btn-sm">View</a>
                  <a href="" class="btn btn-primary btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
