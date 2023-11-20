@extends('layouts/app/contentNavbarLayout')

@section('title', 'Create - ANNOUNCEMENT')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
        integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title d-flex align-items-center">
                            <a href="{{ route('announcement.index') }}" class=""><i class='bx bx-arrow-back'></i></a>
                            <h5 class="card-title text-uppercase mb-0 ms-2">CREATE ANNOUNCEMENT</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">SUBJECT</label>
                                    <input type="text" name="subject" class="form-control">
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
                                    <input type="date" name="date" class="form-control">
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
                                    <textarea class="form-control" name="description" id="textareaSummer" cols="30" rows="9"></textarea>
                                    @error('description')
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

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"
        integrity="sha512-ZESy0bnJYbtgTNGlAD+C2hIZCt4jKGF41T5jZnIXy4oP8CQqcrBGWyxNP16z70z/5Xy6TS/nUZ026WmvOcjNIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#textareaSummer').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    // ['fontsize', ['fontsize']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['undo', 'redo']],
                ],
                // colors: [
                //     ['#ff0000', '#ff9900', '#ffff00'], // Red, Orange, Yellow
                //     ['#00ff00', '#00ffff', '#0000ff'], // Green, Cyan, Blue
                // ],
            });
        });
    </script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
