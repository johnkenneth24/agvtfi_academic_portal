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
@if (session('success'))
<div class="alert alert-info d-flex alert-dismissible" role="alert">
  <span class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i class='bx bx-user-check'></i></span>
  <div class="d-flex flex-column ps-1 justify-content-center">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ session('success') }}</h6>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif
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
                <th>CLASS ADVISORY</th>
                <th>E-MAIL</th>
                <th>Contact No.</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($teachers as $teacher)
              <tr>
                <td style="font-size: 0.90rem;">{{ $teacher->school_id }}</td>
                <td style="font-size: 0.90rem;">{{ $teacher->full_name }}</td>
                <td style="font-size: 0.90rem;">7 - A</td>
                <td style="font-size: 0.90rem;">{{ $teacher->email }}</td>
                <td style="font-size: 0.90rem;">{{ $teacher->contact_number }}</td>
                <td>
                  <a href="" class="btn btn-info btn-sm">View</a>
                  <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              @empty

              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
