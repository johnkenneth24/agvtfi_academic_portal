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
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xxl-12">
                <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <h5 class="card-title text-uppercase">CREATE NEW CLASS ADVISORY</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">ACADEMIC YEAR FROM</label>
                                    <select name="acadyear_from" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @for ($i = now()->year + 3; $i >= 2018; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('acadyear_from')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">ACADEMIC YEAR TO</label>
                                    <select name="acadyear_to" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @for ($i = now()->year + 3; $i >= 2018; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('acadyear_to')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">GRADE LEVEL</label>
                                    <select name="grade_level" id="" class="form-control">
                                        <option value="">--Please Select--</option>
                                        @for ($i = 7; $i <= 12; $i++)
                                            <option value="">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('grade_level')
                                        <div class="invalid-feedback mt-0" style="display: inline-block !important;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="form-label">SECTION</label>
                                    <input type="text" name="lastname" id="" class="form-control">
                                    @error('lastname')
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

            <div class="col-xxl-12 mt-3">
              <div class="card p-2">`
                    <div class="card-header py-0 d-flex justify-content-between align-items-center">
                        <div class="card-title">
                                <h5 class="card-title text-uppercase">ADD STUDENT</h5>
                                </div>
                                                                </div>
                                <div class="card-body">
                      <div class="row" id="student-container">
                                    <div class="col-md-12 student-name" id="student-1">
                              <div class="input-group mb-3">
                                  <select name="student_name[]" class="form-control" placeholder="Student Name"
                                          aria-label="Recipient's username" aria-describedby="button-addon2">
                                      <option value="">--Please Select--</option>
                                  </select>
                                  <button class="btn btn-outline-danger remove-student" onclick="removeStudent(1)" id="button-addon2">REMOVE</button>
                                </div>
                            </div>
                            </div>
                      <div class="col-md-3 mt-2">
                          <button class="btn btn-info" onclick="addStudent()">ADD ANOTHER STUDENT</button>
                      </div>
                  </div>


                    <div class="card-footer justify-content-end d-flex">
                        <a href="{{ route('classad.index') }}" class="btn btn-danger me-2">CANCEL</a>
                                <button type="submit" class="btn btn-info">SUBMIT</button>
                </div>
            </div>
            </div>
        </div>
    </form>
@endsection

@push('page-script')
    <script>
    let studentCount = 1;

    function addStudent() {
        studentCount++;

        const studentContainer = document.getElementById('student-container');
    const studentDiv = document.querySelector('.student-name').cloneNode(true);

        // Update the ID and clear the value
    studentDiv.id = 'student-' + studentCount;
        studentDiv.querySelector('select').value = '';

        // Update the name attribute to have a unique array index
    const selectElement = studentDiv.querySelector('select');
selectElement.setAttribute('name', 'student_name[' + studentCount + ']');

studentContainer.appendChild(studentDiv);
}

function removeStudent(studentId) {
    const studentContainer = document.getElementById('student-container');
    const studentDiv = document.getElementById('student-' + studentId);
    studentContainer.removeChild(studentDiv);
}


    </script>
@endpush
