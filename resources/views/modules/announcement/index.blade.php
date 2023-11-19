@extends('layouts/app/contentNavbarLayout')

@section('title', 'ANNOUNCEMENT')

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
<x-success></x-success>
<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header pb-2 d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="card-title mb-0 text-uppercase">ANNOUNCEMENT</h5>
        </div>
        <div class="card-tools d-flex justify-content-end">
          <div class="col-md-9 me-2">
            <input type="text" class="form-control col-md-" placeholder="Search...">
          </div>
          <div>
            <a href="{{ route('announcement.create') }}" class="btn btn-info text-nowrap">ADD ANNOUNCEMENT</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th>SUBJECT</th>
                <th>DESCRIPTION</th>
                <th>END DATE</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @php
              use Illuminate\Support\Str;
              @endphp
              @forelse($announcement as $ann)
              <tr>
                <td style="font-size: 0.90rem;">{{ $ann->subject }}</td>
                <td style="font-size: 0.90rem;" class="text-wrap">{{ Str::words($ann->description, 5, $end = '...') }}</td>
                <td style="font-size: 0.90rem;">{{ $ann->date->format('F d, Y') }}</td>
                <td>
                  <a href="{{ route('announcement.view' , $ann->id) }}" class="btn btn-info btn-sm">View</a>
                  <a href="{{ route('announcement.edit', $ann->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                  data-bs-target="#backDropModal{{  $ann->id }}">
                  DELETE
              </button>

              <!-- Modal -->
              <div class="modal fade" id="backDropModal{{  $ann->id }}" data-bs-backdrop="static"
                  tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                      <form class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="backDropModalTitle"></h5>
                          </div>
                          <div class="modal-body pt-2 pb-2">
                              <h4 class="text-center">Are you sure <br> you want to delete?
                              </h4>
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                              <button type="button" class="btn btn-secondary"
                                  data-bs-dismiss="modal">Close</button>
                              <a href="{{ route('announcement.delete', $ann->id) }}"
                                  type="button" class="btn btn-danger">Delete</a>
                          </div>
                      </form>
                  </div>
              </div>
              {{-- end modal --}}
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center">
                  No announcement data!
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
