@extends('layouts/app/contentNavbarLayout')

@section('title', 'Class Section')

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
          <h5 class="card-title mb-3 text-uppercase">CLASS SECTION LIST</h5>
        </div>

      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th>GRADE LEVEL</th>
                <th>ACADEMIC YEAR</th>
                <th>STRAND</th>
                <th>CLASS ADVISER</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse($classes as $class)
              <tr>
                <td style="font-size: 0.90rem;">{{ $class->grade_level }}</td>
                <td style="font-size: 0.90rem;">{{ $class->academic_year }}</td>
                <td style="font-size: 0.90rem;">{{ $class->section }}</td>
                <td style="font-size: 0.90rem;">{{ $class->classAdvisoryTeacher->full_name }}</td>
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
