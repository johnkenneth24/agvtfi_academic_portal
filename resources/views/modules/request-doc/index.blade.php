@extends('layouts/app/contentNavbarLayout')

@section('title', 'REQUEST DOCUMENT')

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
<x-errors></x-errors>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">REQUEST DOCUMENT</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-7 me-2">
                            {{-- <input type="text" class="form-control col-md-" placeholder="Search..."> --}}
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Request Document
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">REQUEST DOCUMENT</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{ route('reqdoc.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mt-2">
                                                  <div class="form-group">
                                                    <label for="" class="form-label">Input Document to Request</label>
                                                    <input type="text" name="subject" id="" class="form-control">
                                                    @error('subject')
                                                    <span style="color: red;">{{ $message }}</span><br/>
                                                    @enderror
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">CLOSE</button>
                                                <button type="submit" class="btn btn-primary">REQUEST</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="">DOCUMENT TO REQUEST</th>
                                    <th class="">STATUS</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($reqs as $req)
                                    <tr>
                                        <td class="" style="font-size: 0.90rem;">{{ $req->subject }}</td>
                                        <td class="text-center"style="font-size: 0.90rem;"><span class="badge @if ($req->status == 'Active') bg-label-success @else bg-label-danger @endif  mt-2">{{ $req->status }}</span> </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ asset('documents/'. $req->document) }}" download class="btn btn-primary btn-sm">Download</a>
                                            <a href="" class="btn btn-danger btn-sm ms-2">Cancel</a>

                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                  <td colspan="6" class="text-center">No Data to Show!</td>
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
