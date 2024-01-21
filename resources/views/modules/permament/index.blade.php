@extends('layouts/app/contentNavbarLayout')

@section('title', 'PERMAMENT RECORD')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">

    <style>
        .learner-info input {
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border-width: 1.2px;
            width: 100%;
            font-size: 12px;
        }

        .learner-info input:focus {
            outline: none;
        }

        .learner-info label {
            font-size: 12px;
            color: #000000;
        }
    </style>
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
                <div class="card-body">
                    <div class="row text-center mb-4">
                        <h4 class="text-dark">PERMAMENT RECORD</h4>
                    </div>
                    <div class="learner-info row">
                        <div class="col-md-4">
                            <label for="">LAST NAME:</label>
                            <input type="text" readonly value="{{ auth()->user()->lastname }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">FIRST NAME:</label>
                            <input type="text" readonly value="{{ auth()->user()->firstname }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">MIDDLE NAME:</label>
                            <input type="text" readonly value="{{ auth()->user()->middlename }}">
                        </div>
                    </div>
                    <div class="learner-info row mt-2">
                        <div class="col-md-4">
                            <label for="">DATE OF BIRTH:</label>
                            <input type="text" readonly value="{{ auth()->user()->birthdate->format('F d, Y') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">SEX:</label>
                            <input type="text" readonly value="{{ auth()->user()->gender }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">DATE OF ADMISSION:</label>
                            <input type="text" readonly value="{{ auth()->user()->admission_date->format('F d, Y') }}">
                        </div>
                    </div>

                    <div class="row mt-4 mb-3" style="background-color: #a0a0a0">
                        <div class="d-flex justify-content-center align-items-center pt-2 pb-2">
                            <h6 class="text-white mb-0">SCHOLASTIC RECORD</h6>
                        </div>
                    </div>
                    {{-- 11-1 --}}
                    <div class="row">
                        <div class="card" style="border:  2px solid rgb(66, 0, 246);">
                            <div class="card-header">
                                <div class="learner-info row">
                                    <div class="col-md-4">
                                        <label for="">GRADE LEVEL:</label>
                                        <input type="text" readonly value="11">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">SEMESTER:</label>
                                        <input type="text" readonly value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-3">
                                  <thead style="background-color: #939393; ">
                                    <tr >
                                        <th style="color: #ffffff">
                                            SUBJECT TYPE
                                        </th>
                                        <th style="color: #ffffff">
                                            SUBJECT
                                        </th>
                                        <th style="color: #ffffff">
                                            3rd
                                        </th>
                                        <th style="color: #ffffff">
                                            4th
                                        </th>
                                        <th style="color: #ffffff">
                                            SEM FINAL <br> GRADE
                                        </th>
                                        <th style="color: #ffffff">
                                            ACTION TAKEN
                                        </th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forelse ($firstGradeFirstSem as $fGfS)
                                            <tr>
                                                <td>
                                                    {{ $fGfS->classSubject->subject_code }}
                                                </td>
                                                <td>
                                                    {{ $fGfS->classSubject->subject_name }}
                                                </td>
                                                <td>
                                                    {{ $fGfS->first_grading }}
                                                </td>
                                                <td>
                                                    {{ $fGfS->second_grading }}
                                                </td>
                                                <td>
                                                  @if(!$fGfS->second_grading)
                                                  @else
                                                    {{ $fGfS->gwa }}
                                                  @endif
                                                </td>
                                                <td>
                                                    @if(!$fGfS->second_grading)

                                                    @elseif ($fGfS->gwa >= 75)
                                                        <span class="badge bg-label-success">PASSED</span>
                                                    @else
                                                        <span class="badge bg-label-danger">FAILED</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                              <td colspan="6">
                                                No Grade
                                              </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- 11-2 --}}

                    <div class="row mt-3">
                      <div class="card" style="border:  2px solid rgb(66, 0, 246);">
                          <div class="card-header">
                              <div class="learner-info row">
                                  <div class="col-md-4">
                                      <label for="">GRADE LEVEL:</label>
                                      <input type="text" readonly value="11">
                                  </div>
                                  <div class="col-md-4">
                                      <label for="">SEMESTER:</label>
                                      <input type="text" readonly value="2">
                                  </div>
                              </div>
                          </div>
                          <div class="table-responsive">
                              <table class="table table-bordered mb-3">
                                  <thead style="background-color: #939393; ">
                                      <tr >
                                          <th style="color: #ffffff">
                                              SUBJECT TYPE
                                          </th>
                                          <th style="color: #ffffff">
                                              SUBJECT
                                          </th>
                                          <th style="color: #ffffff">
                                              3rd
                                          </th>
                                          <th style="color: #ffffff">
                                              4th
                                          </th>
                                          <th style="color: #ffffff">
                                              SEM FINAL <br> GRADE
                                          </th>
                                          <th style="color: #ffffff">
                                              ACTION TAKEN
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @forelse ($firstGradeSecondSem as $fGfS)
                                          <tr>
                                              <td>
                                                  {{ $fGfS->classSubject->subject_code }}
                                              </td>
                                              <td>
                                                  {{ $fGfS->classSubject->subject_name }}
                                              </td>
                                              <td>
                                                  {{ $fGfS->first_grading }}
                                              </td>
                                              <td>
                                                  {{ $fGfS->second_grading }}
                                              </td>
                                              <td>
                                                @if(!$fGfS->second_grading)
                                                @else
                                                  {{ $fGfS->gwa }}
                                                @endif
                                              </td>
                                              <td>
                                                  @if(!$fGfS->second_grading)

                                                  @elseif ($fGfS->gwa >= 75)
                                                      <span class="badge bg-label-success">PASSED</span>
                                                  @else
                                                      <span class="badge bg-label-danger">FAILED</span>
                                                  @endif
                                              </td>
                                          </tr>
                                      @empty
                                          <tr>
                                            <td colspan="6">
                                              No Grade
                                            </td>
                                          </tr>
                                      @endforelse
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>

                  {{-- 12-1 --}}

                  <div class="row mt-3">
                    <div class="card" style="border:  2px solid rgb(66, 0, 246);">
                        <div class="card-header">
                            <div class="learner-info row">
                                <div class="col-md-4">
                                    <label for="">GRADE LEVEL:</label>
                                    <input type="text" readonly value="12">
                                </div>
                                <div class="col-md-4">
                                    <label for="">SEMESTER:</label>
                                    <input type="text" readonly value="1">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-3">
                              <thead style="background-color: #939393; ">
                                <tr >
                                    <th style="color: #ffffff">
                                        SUBJECT TYPE
                                    </th>
                                    <th style="color: #ffffff">
                                        SUBJECT
                                    </th>
                                    <th style="color: #ffffff">
                                        3rd
                                    </th>
                                    <th style="color: #ffffff">
                                        4th
                                    </th>
                                    <th style="color: #ffffff">
                                        SEM FINAL <br> GRADE
                                    </th>
                                    <th style="color: #ffffff">
                                        ACTION TAKEN
                                    </th>
                                </tr>
                            </thead>
                                <tbody>
                                    @forelse ($secondGradeFirstSem as $fGfS)
                                        <tr>
                                            <td>
                                                {{ $fGfS->classSubject->subject_code }}
                                            </td>
                                            <td>
                                                {{ $fGfS->classSubject->subject_name }}
                                            </td>
                                            <td>
                                                {{ $fGfS->first_grading }}
                                            </td>
                                            <td>
                                                {{ $fGfS->second_grading }}
                                            </td>
                                            <td>
                                              @if(!$fGfS->second_grading)
                                              @else
                                                {{ $fGfS->gwa }}
                                              @endif
                                            </td>
                                            <td>
                                                @if(!$fGfS->second_grading)

                                                @elseif ($fGfS->gwa >= 75)
                                                    <span class="badge bg-label-success">PASSED</span>
                                                @else
                                                    <span class="badge bg-label-danger">FAILED</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                          <td colspan="6">
                                            No Grade
                                          </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- 12-2 --}}

                <div class="row mt-3">
                  <div class="card" style="border:  2px solid rgb(66, 0, 246);">
                      <div class="card-header">
                          <div class="learner-info row">
                              <div class="col-md-4">
                                  <label for="">GRADE LEVEL:</label>
                                  <input type="text" readonly value="12">
                              </div>
                              <div class="col-md-4">
                                  <label for="">SEMESTER:</label>
                                  <input type="text" readonly value="2">
                              </div>
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-bordered mb-3">
                            <thead style="background-color: #939393; ">
                              <tr >
                                  <th style="color: #ffffff">
                                      SUBJECT TYPE
                                  </th>
                                  <th style="color: #ffffff">
                                      SUBJECT
                                  </th>
                                  <th style="color: #ffffff">
                                      3rd
                                  </th>
                                  <th style="color: #ffffff">
                                      4th
                                  </th>
                                  <th style="color: #ffffff">
                                      SEM FINAL <br> GRADE
                                  </th>
                                  <th style="color: #ffffff">
                                      ACTION TAKEN
                                  </th>
                              </tr>
                          </thead>
                              <tbody>
                                  @forelse ($secondGradeSecondSem as $fGfS)
                                      <tr>
                                          <td>
                                              {{ $fGfS->classSubject->subject_code }}
                                          </td>
                                          <td>
                                              {{ $fGfS->classSubject->subject_name }}
                                          </td>
                                          <td>
                                              {{ $fGfS->first_grading }}
                                          </td>
                                          <td>
                                              {{ $fGfS->second_grading }}
                                          </td>
                                          <td>
                                            @if(!$fGfS->second_grading)
                                            @else
                                              {{ $fGfS->gwa }}
                                            @endif
                                          </td>
                                          <td>
                                              @if(!$fGfS->second_grading)

                                              @elseif ($fGfS->gwa >= 75)
                                                  <span class="badge bg-label-success">PASSED</span>
                                              @else
                                                  <span class="badge bg-label-danger">FAILED</span>
                                              @endif
                                          </td>
                                      </tr>
                                  @empty
                                      <tr>
                                        <td colspan="6">
                                          No Grade
                                        </td>
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
    </div>
@endsection
