@extends('layouts/app/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">SET GRADE</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">GRADE LEVEL AND SECTION</label>
                                    <input type="text" class="form-control" value="7 - A" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">ACADEMIC YEAR</label>
                                    <input type="text" class="form-control" value="2023-2024" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">SUBJECT CLASS</label>
                                    <input type="text" class="form-control" value="SCIENCE" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">STATUS</label>
                                    <input type="text" class="form-control" value="ACTIVE" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-footer justify-content-end d-flex">
                        <a href="{{ route('student.index') }}" class="btn btn-danger me-2">CANCEL</a>
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">STUDENT LIST</h5>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">NAME OF STUDENT</label>
                                    <input type="text" class="form-control" value="JUAN DELA CRUZ">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-label">FIRST GRADING</label>
                                    <input type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-label">SECOND GRADING</label>
                                    <input type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="" class="form-label">THIRD GRADING</label>
                                    <input type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                  <label for="" class="form-label">FOURTH GRADING</label>
                                  <input type="text" class="form-control" >
                              </div>
                          </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-footer justify-content-end d-flex">
                      <a href="{{ route('classsub.index') }}" class="btn btn-danger me-2">CANCEL</a>
                      <button type="submit" class="btn btn-info">SUBMIT GRADE</button>
                  </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@push('page-script')
@endpush
