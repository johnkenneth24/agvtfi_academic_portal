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

                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th class="">DOCUMENT TO REQUEST</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($reqs as $req)
                                    <tr>
                                      <td class="" style="font-size: 0.90rem;">{{ $req->student->fullname }}</td>

                                        <td class="" style="font-size: 0.90rem;">{{ $req->subject }}</td>
                                        <td class="text-center"style="font-size: 0.90rem;"><span class="badge @if ($req->status == 'Active') bg-label-success @else bg-label-danger @endif  mt-2">{{ $req->status }}</span> </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="" class="btn btn-primary btn-sm">Grant</a>
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
