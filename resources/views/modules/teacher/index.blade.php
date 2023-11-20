@extends('layouts/app/contentNavbarLayout')

@section('title', 'AGVTFI - Teachers List')

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
    @if (session('success'))
        <div class="alert alert-info d-flex alert-dismissible" role="alert">
            <span class="badge badge-center rounded-pill bg-info border-label-info p-3 me-2"><i
                    class='bx bx-user-check'></i></span>
            <div class="d-flex flex-column ps-1 justify-content-center">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">{{ session('success') }}</h6>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">TEACHER LIST</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-6 me-2">
                            <form action="{{ route('teacher.index') }}" method="get">
                                @csrf
                                <input class="form-control col-md-3 d-none d-md-block" type="search" autocomplete="off"
                                    autofocus placeholder="Search..." name="search">
                            </form>
                        </div>
                        <a href="{{ route('teacher.create') }}" class="btn btn-info">ADD NEW TEACHER</a>
                    </div>
                </div>
                <div class="card-body"> `
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>SCHOOL ID</th>
                                    <th>FULL NAME</th>
                                    <th>CLASS ADVISORY</th>
                                    <th>E-MAIL</th>
                                    <th>Contact No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($teachers as $teacher)
                                    <tr>
                                        <td style="font-size: 0.90rem;">{{ $teacher->school_id }}</td>
                                        <td style="font-size: 0.90rem;">{{ $teacher->full_name }}</td>
                                        <td style="font-size: 0.90rem;">
                                            {{ $teacher?->class_adviser?->first()?->grade_level ?? 'none' }}
                                        </td>
                                        <td style="font-size: 0.90rem;">{{ $teacher->email }}</td>
                                        <td style="font-size: 0.90rem;">+63{{ $teacher->contact_number }}</td>
                                        <td>
                                            <a href="{{ route('teacher.view', $teacher->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $teacher->id }}">
                                                DELETE
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="backDropModal{{ $teacher->id }}" data-bs-backdrop="static"
                                        tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="backDropModalTitle"></h5>
                                                </div>
                                                <div class="modal-body pt-2 px-3">
                                                    <h4 class="text-center">Are you sure you want to delete this teacher
                                                        record?</h4>
                                                    <h6 class="text-danger text-center">Note: This action is irreversible.
                                                    </h6>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No, Cancel</button>
                                                    <a href="{{ route('teacher.delete', $teacher) }}" type="button"
                                                        class="btn btn-danger">Yes, Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
