@extends('layouts/app/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <style>
      .form-control:disabled, .form-control[readonly] {
    background-color: #ffffff !important;
    /* opacity: 1; */
}
    </style>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

@endsection

@section('content')
    <x-success></x-success>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card p-2">`
                <div class="card-header py-0 d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        <h5 class="card-title text-uppercase">SET GRADE</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">SUBJECT CODE</label>
                                <input type="text" class="form-control" value="{{ $class->subject_code }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="form-label">SUBJECT CLASS</label>
                                <input type="text" class="form-control" value="{{ $class->subject_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="" class="form-label">GRADE AND SECTION</label>
                                <input type="text" class="form-control" value="{{ $class->classAdvisory->grade_level }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="" class="form-label">ACADEMIC YEAR</label>
                                <input type="text" class="form-control"
                                    value="{{ $class->classAdvisory->academic_year }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="" class="form-label">STATUS</label>
                                <input type="text" class="form-control" value="ACTIVE" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$student_grade->isEmpty())
        <div class="row mt-2">
            <form action="{{ route('classsub.set-grade-update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-xxl-12">
                    <div class="card p-2">`
                        <div class="card-header py-0 d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h5 class="card-title mb-0 text-uppercase">STUDENT LIST</h5>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            @forelse ($student_grade as $student)
                                <input type="hidden" name="id[]" value="{{ $student->id }}">
                                <input type="hidden" name="class_sub_id[]" value="{{ $student->class_sub_id }}">
                                <input type="hidden" name="class_advisory_id[]" value="{{ $student->class_advisory_id }}">
                                <input type="hidden" name="student_id[]" value="{{ $student->student_id }}">
                                <div class="row g-2 mt-2">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="" class="form-label">NAME OF STUDENT</label>
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text" id="basic-addon-search31"><i class='bx bxs-user-circle' ></i></span>
                                            <input type="text" class="form-control "
                                                value="{{ $student->classSubjectStudent->fullname }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                          @if($class->semester == 1)
                                          <label for="" class="form-label">FIRST GRADING</label>
                                          @else
                                          <label for="" class="form-label">THIRD GRADING</label>
                                          @endif
                                            <div class="input-group input-group-merge">
                                              @if($student->first_grading == null)
                                              <span class="input-group-text"
                                                      id="basic-addon-search31"><i class='bx bxs-checkbox-minus' ></i></span>
                                              @elseif ($student->first_grading >= 75)
                                                  <span class="input-group-text text-success"
                                                      id="basic-addon-search31"><i
                                                          class="bx bxs-check-circle"></i></span>
                                              @else
                                                  <span class="input-group-text text-danger"
                                                      id="basic-addon-search31"><i class='bx bxs-x-circle'></i></span>
                                              @endif
                                                <input type="number" step="0.01" value="{{ $student->first_grading }}"
                                                    name="first_grading[]" class="form-control "
                                                    placeholder="" aria-label="" aria-describedby="basic-addon-search31" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            @if($class->semester == 1)
                                            <label for="" class="form-label">SECOND GRADING</label>
                                            @else
                                          <label for="" class="form-label">FOURTH GRADING</label>
                                            @endif
                                            <div class="input-group input-group-merge">
                                              @if($student->second_grading == null)
                                              <span class="input-group-text"
                                                      id="basic-addon-search31"><i class='bx bxs-checkbox-minus' ></i></span>
                                              @elseif ($student->second_grading >= 75)
                                                  <span class="input-group-text text-success"
                                                      id="basic-addon-search31"><i
                                                          class="bx bxs-check-circle"></i></span>
                                              @else
                                                  <span class="input-group-text text-danger"
                                                      id="basic-addon-search31"><i class='bx bxs-x-circle'></i></span>
                                              @endif
                                                <input type="number" step="0.01"
                                                    value="{{ $student->second_grading }}" name="second_grading[]"
                                                    class="form-control " placeholder="" aria-label=""
                                                    aria-describedby="basic-addon-search31" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                          <label for="" class="form-label">GWA  </label>
                                              <input type="text" step="0.01"
                                                  value="{{ $student->gwa }}"
                                                  class="form-control  {{ $student->gwa >=75 ? 'text-success' : 'text-danger'  }}" placeholder="" aria-label=""
                                                  aria-describedby="basic-addon-search31" />
                                          </div>
                                  </div>
                                </div>
                                <hr>
                            @empty
                            @endforelse
                        </div>
                        <div class="card-footer justify-content-end d-flex">
                            <button type="submit" class="btn btn-info">UPDATE GRADE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if (!$studentsWithoutGrade->isEmpty())
        <form action="{{ route('classsub.set-grade-store') }}" method="POST">
            <div class="row mt-2">
                @csrf
                <div class="col-xxl-12">
                    <div class="card p-2">`
                        <div class="card-header py-0 d-flex justify-content-between align-items-center">
                            <div class="card-title">
                                <h5 class="card-title text-uppercase">STUDENT WITHOUT GRADE</h5>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            @forelse ($studentsWithoutGrade as $student)
                                <input type="hidden" name="class_sub_id[]" value="{{ $class->id }}">
                                <input type="hidden" name="class_advisory_id[]"
                                    value="{{ $student->class_advisory_id }}">
                                <input type="hidden" name="student_id[]" value="{{ $student->student_id }}">
                                <div class="row g-2 mt-2">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">NAME OF STUDENT</label>
                                            <input type="text" class="form-control "
                                                value="{{ $student->classStudent->fullname }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          @if($class->semester == 1)
                                          <label for="" class="form-label">FIRST GRADING</label>
                                          @else
                                          <label for="" class="form-label">THIRD GRADING</label>
                                          @endif
                                            <input type="number" value="" step="0.01" name="first_grading[]"
                                                class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          @if($class->semester == 1)
                                          <label for="" class="form-label">SECOND GRADING</label>
                                          @else
                                          <label for="" class="form-label">FOURTH GRADING</label>
                                          @endif
                                            <input type="number" value="" step="0.01" name="second_grading[]"
                                                class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @empty
                            @endforelse
                        </div>
                        <div class="card-footer justify-content-end d-flex">
                            <a href="{{ route('classsub.index') }}" class="btn btn-danger me-2">CANCEL</a>
                            <button type="submit" class="btn btn-info">SUBMIT GRADE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection

@push('page-script')
@endpush
