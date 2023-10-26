@extends('layouts/app/contentNavbarLayout')

@section('title', 'View - ANNOUNCEMENT')

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
    <form action="{{ route('announcement.update', [$ann]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                      <div class="card-title d-flex align-items-center">
                        <a href="{{ route('announcement.index') }}" class=""><i class='bx bx-arrow-back'></i></a>
                        <h5 class="card-title text-uppercase mb-0 ms-2"> {{ $ann->subject }} | ANNOUNCEMENT</h5>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">SUBJECT</label>
                                    <input readonly type="text" value="{{ $ann->subject }}" name="subject" id="" class="form-control">
                                    @error('subject')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">ANNOUNCEMENT END DATE</label>
                                    <input readonly type="date" value="{{ $ann->date->format('Y-m-d') }}" name="date" id="" class="form-control">
                                    @error('date')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label">DESCRIPTION</label>
                                    <textarea class="form-control" value="" name="description" id="" cols="30" rows="3" disabled >{{ $ann->description }}</textarea>
                                    @error('description')
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
    </form>
@endsection
@push('page-script')
@endpush
