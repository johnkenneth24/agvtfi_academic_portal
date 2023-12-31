@extends('layouts/app/contentNavbarLayout')

@section('title', 'Class Advisory')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-style')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <x-success></x-success>
    <x-errors></x-errors>
    <div class="row">
        <div class="col-md-7">
            <div class="card p-2" style="height: 160.297px;">
                <div class="card-header pt-2 pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h6 class="card-title mb-0 text-uppercase">CLASS ADVISORY | {{ $student->section }}</h6>
                    </div>
                    <div class="card-tools d-flex justify-content-end">

                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-2 mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">ACADEMIC YEAR FROM</label>
                                <input type="text" class="form-control" value="{{ $student->academic_year }}" readonly>
                                @error('academic_year')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">GRADE LEVEL</label>
                                <input type="text" class="form-control" value="{{ $student->grade_level }}" readonly>
                                @error('grade_level')
                                    <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <form action="{{ route('classad.store-student') }}" method="POST">
                    @csrf('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="class_advisory_id" value="{{ $student->id }}" id="">
                            <label for="" class="form-label">SELECT STUDENT</label>
                            <select class="js-example-basic-single js-states form-control" name="student_id">
                                <option value="NA">Please Select</option>
                                @foreach ($student_name as $student)
                                    <option value="{{ $student->id }}">{{ $student->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">ADD STUDENT</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xxl-12 mt-3">
            <div class="card pt-4">
                <div class="card-header py-0 d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        <h5 class="card-title text-uppercase">STUDENT LIST</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Birthdate</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($student_list as $student)
                                  <tr>
                                      <td>{{ $student->classStudent->school_id }}</td>
                                      <td>{{ $student->classStudent->fullname }}</td>
                                      <td>{{ $student->classStudent->contact_number }}</td>
                                      <td>{{ $student->classStudent->address }}</td>
                                      <td>
                                          <a href="{{ route('classad.student-info', $student->id) }}" class="btn btn-primary btn-sm">Personal Information</a>
                                          <button type="button" class="btn btn-sm btn-danger text-nowrap" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $student->id }}">
                                            Delete
                                          </button>
                                      </td>
                                  </tr>

                                  <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $student->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                            <h5 class="text-center mt-5">Are you sure you want to delete this record?</h5>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                            <a href="{{ route('classad.student-delete', $student->id) }}" type="submit" class="btn text-white btn-danger">DELETE</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  @empty
                                  <tr>
                                    <td colspan="5">No Student to Show</td>
                                  </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Please Select",
                allowClear: true
            });
        });
    </script>
@endpush
