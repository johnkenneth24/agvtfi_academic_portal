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
                            <input type="text" class="form-control col-md-3" placeholder="Search...">
                        </div>
                        <a href="{{ route('student.create') }}" class="btn btn-info">ADD NEW STUDENT</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-5 mb-3 d-flex ">
                        <form action="{{ route('student.extract') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="" class="form-label mb-0">Select an .xlsx .xls file to import student</label>
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
                                        <td style="font-size: 0.90rem;">{{ $student->contact_number }}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">View</a>
                                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
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
