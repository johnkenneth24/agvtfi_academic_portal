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
    <form action="{{ route('classad.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">CREATE ENROLLMENT APPLICATION</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">SUBJECT</label>
                                    <input type="text" name="subject" id="" class="form-control"
                                        value="{{ 'Enrollment Year For ' . now()->format('Y') }}">
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
                                    <input type="date" name="subject" id="" class="form-control">
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
                                    <input type="date" name="subject" id="" class="form-control">
                                    @error('subject')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end d-flex">
                        <a href="{{ route('announcement.index') }}" class="btn btn-danger me-2">CANCEL</a>
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('page-script')
@endpush
