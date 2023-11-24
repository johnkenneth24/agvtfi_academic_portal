@extends('layouts/app/contentNavbarLayout')

@section('title', 'ENROLLMENT STATUS')

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
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">ENROLLMENT STATUS</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-9 me-2">
                            <input type="text" class="form-control col-md-" placeholder="Search...">
                        </div>
                        {{-- <a href="" class="btn btn-info">ADD NEW STUDENT</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>APPLICATION DATE</th>
                                    <th>GRADE LEVEL TO ENROLL</th>
                                    <th>STATUS</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($list_enrollment as $list_enroll)
                                    <tr>
                                        {{-- <td>{{ $list_enroll->id }}</td> --}}
                                        <td style="font-size: 0.90rem;">{{ $list_enroll->created_at->format('F d, Y') }}
                                        </td>
                                        <td style="font-size: 0.90rem;">{{ $list_enroll->year_level }}</td>
                                        <td class=""style="font-size: 0.90rem;">
                                            @if ($list_enroll->status == 'Current')
                                                <span class="badge bg-label-success">{{ $list_enroll->status }}</span>
                                        </td>
                                    @else
                                        <span class="badge bg-label-warning">{{ $list_enroll->status }}</span></td>
                                @endif
                                <td>
                                    @if ($list_enroll->status == 'Pending')
                                        <a href="" class="btn btn-danger btn-sm">Cancel</a>
                                    @endif
                                </td>
                                </tr>
                            @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
