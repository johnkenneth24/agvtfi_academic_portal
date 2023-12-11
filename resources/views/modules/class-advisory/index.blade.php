@extends('layouts/app/contentNavbarLayout')

@section('title', 'Class Advisory')

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
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">CLASS ADVISORY</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-7 me-2">
                            <form action="{{ route('classad.index') }}" method="get">
                                @csrf
                                <input class="form-control col-md-3 d-none d-md-block" type="search" autocomplete="off"
                                    id="searchInput" autofocus placeholder="Search..." name="search">
                            </form>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                CREATE CLASS ADVISORY
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CREATE CLASS ADVISORY</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{ route('classad.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">ACADEMIC YEAR FROM</label>
                                                            <select name="academic_year" id=""
                                                                class="form-control">
                                                                <option value="">--Please Select--</option>
                                                                @for ($i = now()->year; $i >= 2018; $i--)
                                                                    <option value="{{ $i . '-' . $i + 1 }}">
                                                                        {{ $i }} - {{ $i + 1 }}
                                                                    </option>
                                                                @endfor
                                                            </select>
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
                                                            <label class="form-label">GRADE LEVEL</label>
                                                            <select name="grade_level" id="" class="form-control">
                                                                <option value="">--Please Select--</option>
                                                                @for ($i = 11; $i <= 12; $i++)
                                                                    <option value=" {{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
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
                                                            <label class="form-label">STRANDS</label>
                                                            <select name="section" id="" class="form-control">
                                                                <option value="">--Please Select--</option>
                                                                @foreach ($strands as $strand)
                                                                    <option value="{{ $strand }}">
                                                                        {{ $strand }}</option>
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
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="">ACADEMIC YEAR</th>
                                    <th class="text-center">GRADE</th>
                                    <th class="text-center">SECTION</th>
                                    <th class="text-center">NO. OF STUDENT</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($classes as $class)
                                    <tr>
                                        <td class="" style="font-size: 0.90rem;">{{ $class->academic_year }}</td>
                                        <td class="text-center" style="font-size: 0.90rem;">{{ $class->grade_level }}</td>
                                        <td class="text-center" style="font-size: 0.90rem;">{{ $class->section }}</td>
                                        <td class="text-center" style="font-size: 0.90rem;">
                                            {{ $class->classAdvisoryStudent->count() }}</td>
                                        <td class="text-center"style="font-size: 0.90rem;"><span
                                                class="badge @if ($class->status == 'Active') bg-label-success @else bg-label-danger @endif  mt-2">{{ $class->status }}</span>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('classad.class-student', $class->id) }}"
                                                class="btn btn-warning btn-sm ">Student</a>
                                            <button type="button" class="btn mx-2 btn-primary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $class->id }}">Edit</button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $class->id }}">
                                                DELETE
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="backDropModal{{ $class->id }}"
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
                                                            <a href="{{ route('classad.delete', $class->id) }}"
                                                                type="button" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- end modal --}}

                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal{{ $class->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">EDIT CLASS
                                                        {{ $class->academic_year }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <form action="{{ route('classad.update', $class->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label">ACADEMIC YEAR FROM</label>
                                                                    <select name="academic_year" id=""
                                                                        class="form-control">
                                                                        <option value="">--Please Select--</option>
                                                                        @for ($i = now()->year; $i >= 2018; $i--)
                                                                            <option value="{{ $i . '-' . $i + 1 }}"
                                                                                @selected($class->academic_year == $i . '-' . $i + 1)>
                                                                                {{ $i }} - {{ $i + 1 }}
                                                                            </option>
                                                                        @endfor
                                                                    </select>
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
                                                                    <label class="form-label">GRADE LEVEL</label>
                                                                    <select name="grade_level" id=""
                                                                        class="form-control">
                                                                        <option value="">--Please Select--</option>
                                                                        @for ($i = 11; $i <= 12; $i++)
                                                                            <option value="{{ $i }}"
                                                                                @selected($class->grade_level == $i)>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
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
                                                                    <label class="form-label">SECTION</label>
                                                                    <select name="section" id=""
                                                                        class="form-control">
                                                                        <option value="">--Please Select--</option>
                                                                        @foreach ($strands as $strand)
                                                                            <option value="{{ $strand }}"
                                                                                @selected($class->section == $strand)>
                                                                                {{ $strand }}</option>
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
