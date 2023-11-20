@extends('layouts/app/contentNavbarLayout')

@section('title', 'Student List')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
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
                        <h5 class="card-title mb-0 text-uppercase">STUDENT LIST</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-6 me-2">
                            <form action="{{ route('student.index') }}" method="get">
                                @csrf
                                <input class="form-control col-md-3 d-none d-md-block" type="search" autocomplete="off"
                                    id="searchInput" autofocus placeholder="Search..." name="search">
                            </form>
                        </div>
                        <a href="{{ route('student.create') }}" class="btn btn-info">ADD NEW STUDENT</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-5 mb-3 d-flex ">
                        <form action="{{ route('student.extract') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="" class="form-label mb-0">Select an .xlsx or an .xls file to import
                                student</label>
                            <div class="input-group">
                                <input type="file" name="excel_file" class="form-control">
                                <button type="submit" class="btn btn-info">EXTRACT</button>
                                @error('excel_file')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>SCHOOL ID</th>
                                    <th>FULL NAME</th>
                                    <th>E-MAIL</th>
                                    <th>Contact No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($students as $student)
                                    <tr>
                                        <td style="font-size: 0.90rem;">{{ $student->school_id }}</td>
                                        <td style="font-size: 0.90rem;">{{ $student->full_name }}</td>
                                        <td style="font-size: 0.90rem;">{{ $student->email }}</td>
                                        <td style="font-size: 0.90rem;">+63{{ $student->contact_number }}</td>
                                        <td>
                                          <a href="{{ route('permament-rec.adminIndex', $student->id) }}"
                                            class="btn btn-warning btn-sm">Grade Record</a>
                                            <a href="{{ route('student.show', $student->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('student.edit', $student->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $student->id }}">
                                                DELETE
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="backDropModal{{ $student->id }}" data-bs-backdrop="static"
                                        tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="backDropModalTitle"></h5>
                                                </div>
                                                <div class="modal-body pt-2 px-3">
                                                    <h4 class="text-center">Are you sure you want to delete this student
                                                        record?</h4>
                                                    <h6 class="text-danger text-center">Note: This action is irreversible.
                                                    </h6>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No, Cancel</button>
                                                    <a href="{{ route('student.delete', $student) }}" type="button"
                                                        class="btn btn-danger">Yes, Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script>
        $(document).ready(function() {
            var searchInput = $('#searchInput');

            searchInput.on('input', function() {
                $(this).closest('form').submit();
            });
        });
    </script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
