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
      <div class="card-header pb-2 d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="card-title mb-0 text-uppercase">CLASS SUBJECT</h5>
        </div>
        <div class="card-tools d-flex justify-content-end">
          <div class="col-md-7 me-2">
            <input type="text" class="form-control col-md-" placeholder="Search...">
          </div>
          <div>
            <a href="{{ route('classsub.create') }}" class="btn btn-info text-nowrap">CREATE CLASS SUBJECT</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap mt-3">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th class="">ACADEMIC YEAR</th>
                <th class="text-center">SUBJECT</th>
                <th class="text-center">YEAR & SECTION</th>
                <th class="text-center">STATUS</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr></tr>
                <td class="" style="font-size: 0.90rem;">2023 - 2024</td>
                <td class="text-center" style="font-size: 0.90rem;">7 - A</td>
                <td class="text-center" style="font-size: 0.90rem;">SCIENCE</td>
                <td class="text-center"style="font-size: 0.90rem;"><span class="badge bg-label-success mt-2">ACTIVE</span></td>

                <td class="d-flex justify-content-center">
                  <a href="{{ route('classsub.set-grade') }}" class="btn btn-warning btn-sm me-1">Set Grade</a>
                  <a href="{{ route('classsub.view') }}" class="btn btn-info btn-sm ">View</a>
                  <a href="" class="btn btn-primary btn-sm me-1 ms-1">Edit</a>
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