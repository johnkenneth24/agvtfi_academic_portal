@extends('layouts/app/contentNavbarLayout')

@section('title', 'View - ANNOUNCEMENT')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .textarea-style {
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            background-color: #ECEEF1;
        }

        .textarea-style p {
            margin-bottom: 0;
            /* Remove the default margin of the paragraph tag */
        }
    </style>
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
                                    <input readonly type="text" value="{{ $ann->subject }}" name="subject" id=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">ANNOUNCEMENT END DATE</label>
                                    <input readonly type="date" value="{{ $ann->date->format('Y-m-d') }}" name="date"
                                        id="" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label">DESCRIPTION</label>
                                    <div class="textarea-style">
                                        <p>{!! $ann->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
