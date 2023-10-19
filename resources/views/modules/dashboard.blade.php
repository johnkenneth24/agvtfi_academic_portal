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
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Hi {{ auth()->user()->full_name }}! 🎉</h5>
            @role('admin')
            <p class="mb-4">Monitor your users now. Be productive!</p>
            @endrole
            @role('student')
            <p class="mb-4">Check your acads status now. Be productive!</p>
            @endrole
            @role('teacher')
            <p class="mb-4">Manage your student and monitor their academic performance. Be productive!</p>
            @endrole
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  @unlessrole('teacher')
  <div class="col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
          <img class="img-fluid w-20" src="{{ asset('assets/img/illustrations/sitting-girl-with-laptop-dark.png') }}" alt="Card girl image">
        </div>
        <h4 class="mb-2 pb-1">Upcoming Enrollment</h4>
        <p class="small">Application for enrollment will be activated on below date mentioned.</p>
        <div class="row mb-3 g-3">
          <div class="col-12">
            <div class="d-flex">
              <div class="avatar flex-shrink-0 me-2">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-calendar-exclamation bx-sm"></i></span>
              </div>
              <div>
                <h6 class="mb-0 text-nowrap">17 Nov 23</h6>
                <small>Date</small>
              </div>
            </div>
          </div>

        </div>
        @role('student')
        <a href="javascript:void(0);" class="btn btn-primary w-100" style="pointer-events: none" >Enroll Now</a>
        @endrole
      </div>
    </div>
  </div>
  @endunlessrole
  <div class="col-md-8 order-4 order-lg-3 ">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Announcement!</h5>
      </div>
      <div class="card-body">
        <!-- Activity Timeline -->
        <ul class="timeline">
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point-wrapper"><span class="timeline-point timeline-point-primary"></span></span>
            <div class="timeline-event">
              <div class="timeline-header mb-1">
                <h6 class="mb-0">No Classes Today!</h6>
                <small class="text-muted">12 minutes ago</small>
                <p class="mb-2">The Principal announced that there will be no classes today due to bad weather. Keep safe everyone!</p>
              </div>
            </div>
          </li>
        </ul>
        <!-- /Activity Timeline -->
      </div>
    </div>
  </div>
</div>
@endsection
