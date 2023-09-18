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
          <h5 class="card-title mb-0 text-uppercase">CLASS SECTION LIST</h5>
        </div>
        <div class="card-tools d-flex justify-content-end">
          <div class="col-md-9 me-2">
            <input type="text" class="form-control col-md-" placeholder="Search...">
          </div>
          {{-- <a href="" class="btn btn-info">ADD NEW STUDENT</a> --}}
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th>YEAR</th>
                <th>SECTION</th>
                <th>SCHOOL YEAR</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td style="font-size: 0.90rem;">7</td>
                <td style="font-size: 0.90rem;">A</td>
                <td style="font-size: 0.90rem;">2023-2024</td>
                <td>
                  <a href="" class="btn btn-info btn-sm">View</a>
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
