@extends('layouts/app/contentNavbarLayout')

@section('title', 'AGVTFI - Class Subject')

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
                        <h5 class="card-title mb-0 text-uppercase">CLASS SUBJECT</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-7 me-2">
                            <form action="{{ route('classsub.index') }}" method="get">
                                @csrf
                                <input class="form-control col-md-3 d-none d-md-block" type="search" autocomplete="off"
                                    id="searchInput" autofocus placeholder="Search..." name="search">
                            </form>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                CREATE CLASS SUBJECT
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CREATE CLASS SUBJECT</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{ route('classsub.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">SUBJECT CODE</label>
                                                            <input type="text" name="subject_code" id=""
                                                                class="form-control">
                                                            @error('academic_year')
                                                                <div class="invalid-feedback mt-0"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">SUBJECT NAME</label>
                                                            <input type="text" name="subject_name" id=""
                                                                class="form-control">
                                                            @error('grade_level')
                                                                <div class="invalid-feedback mt-0"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">YEAR & SECTION</label>
                                                            <select name="year_section_id" id=""
                                                                class="form-control">
                                                                <option value="">Please Select</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">
                                                                        {{ $class->grade_level . ' | Section - ' . $class->section }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('section')
                                                                <div class="invalid-feedback mt-0"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">CLOSE</button>
                                                <button type="submit" class="btn btn-primary">SAVE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="">SUBJECT CODE</th>
                                    <th class="">SUBJECT NAME</th>
                                    <th class="">ACADEMIC YEAR</th>
                                    <th class="text-center">YEAR & SECTION</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($class_subject as $class_sub)
                                    <tr>
                                        <td class="text-center" style="font-size: 0.90rem;">{{ $class_sub->subject_code }}
                                        </td>
                                        <td class="" style="font-size: 0.90rem;">{{ $class_sub->subject_name }}</td>
                                        <td class="" style="font-size: 0.90rem;">
                                            {{ $class_sub->classAdvisory->academic_year }}</td>
                                        <td class="text-center" style="font-size: 0.90rem;">
                                            {{ $class_sub->classAdvisory->grade_level }}
                                        </td>
                                        <td class="text-center"style="font-size: 0.90rem;"><span
                                                class="badge bg-label-success mt-2">ACTIVE</span></td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('classsub.set-grade', $class_sub->id) }}"
                                                class="btn btn-warning btn-sm me-1">Set Grade</a>
                                            <button type="button" class="btn me-1 btn-sm btn-primary text-nowrap"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $class_sub->id }}">
                                                DELETE
                                            </button>

                                            {{-- delete modal --}}
                                            <div class="modal fade" id="backDropModal{{ $class_sub->id }}"
                                                data-bs-backdrop="static" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <form class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="backDropModalTitle"></h5>
                                                        </div>
                                                        <div class="modal-body pt-2 pb-2">
                                                            <h4 class="text-center">Are you sure <br> you want to delete?
                                                            </h4>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="{{ route('classsub.delete', $class_sub->id) }}"
                                                                class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            {{-- end delete modal --}}
                                        </td>
                                    </tr>
                                    {{-- modal --}}
                                    <div class="modal fade" id="editModal" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">EDIT CLASS SUBJECT</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{ route('classsub.update', $class_sub) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">SUBJECT CODE</label>
                                                                    <input type="text" name="subject_code"
                                                                        value="{{ $class_sub->subject_code }}"
                                                                        id="" class="form-control">
                                                                    @error('academic_year')
                                                                        <div class="invalid-feedback mt-0"
                                                                            style="display: inline-block !important;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">SUBJECT NAME</label>
                                                                    <input type="text" name="subject_name"
                                                                        value="{{ $class_sub->subject_name }}"
                                                                        id="" class="form-control">
                                                                    @error('grade_level')
                                                                        <div class="invalid-feedback mt-0"
                                                                            style="display: inline-block !important;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">YEAR & SECTION</label>
                                                                    <select name="year_section_id" id=""
                                                                        class="form-control">
                                                                        <option value="">Please Select</option>
                                                                        @foreach ($classes as $class)
                                                                            <option value="{{ $class->id }}"
                                                                                @selected($class_sub->year_section_id == $class->id)>
                                                                                {{ $class->grade_level . ' | Section - ' . $class->section }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('section')
                                                                        <div class="invalid-feedback mt-0"
                                                                            style="display: inline-block !important;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">CLOSE</button>
                                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}

                                @empty
                                    <tr>
                                        <td colspan="6"></td>
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
