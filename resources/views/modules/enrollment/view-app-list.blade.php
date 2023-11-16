@extends('layouts/app/contentNavbarLayout')

@section('title', 'Class Advisory')

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
<x-success></x-success>
    <form action="{{ route('classad.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="card-title text-uppercase">APPLICATION LIST</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">SUBJECT</label>
                                    <input type="text" name="subject" id="" class="form-control"
                                        value="{{ $enrollment->subject }}">
                                    @error('subject')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label">ENROLLMENT START DATE</label>
                                    <input type="date" name="subject" id="" class="form-control" value="{{ $enrollment->start->format('Y-m-d') }}">
                                    @error('subject')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label">ENROLLMENT END DATE</label>
                                    <input type="date" name="subject" id="" class="form-control" value="{{ $enrollment->end->format('Y-m-d') }}">
                                    @error('subject')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col-xxl-12">
              <div class="card p-2">`
                  <div class="card-header py-0 d-flex justify-content-between align-items-center">
                      <div class="card-title mb-0">
                          <h5 class="card-title text-uppercase">APPLICANT LIST</h5>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover table-sm">
                        <thead>
                          <tr>
                            <th>STUDENT NAME</th>
                            <th>GRADE LEVEL TO ENROLL</th>
                            <th>STATUS</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          @forelse($pendings as $pending)
                          <tr>
                            <td style="font-size: 0.90rem;">{{ $pending->user->fullname }}</td>
                            <td style="font-size: 0.90rem;">{{ $pending->year_level }}</td>
                            <td class=""style="font-size: 0.90rem;"><span class="badge bg-label-warning mt-2">PENDING</span></td>
                            <td>
                              <a href="{{ route('enrollment.approved', ['pending' => $pending->id, 'enrollment' => $enrollment->id]) }}" class="btn btn-info btn-sm">APPROVED</a>
                              <a href="" class="btn btn-danger btn-sm">CANCEL</a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center">No enrollee found!</td>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </form>
@endsection
@push('page-script')
@endpush
