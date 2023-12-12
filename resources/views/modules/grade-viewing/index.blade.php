@extends('layouts/app/contentNavbarLayout')

@section('title', 'Grades')

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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('grade.index') }}" method="get">
                            @csrf
                            <div class="row d-flex align-items-center">
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="form-label">GRADE LEVEL</label>
                                        <select name="grade_level" class="form-control">
                                            <option value="" disabled selected>PLEASE SELECT</option>
                                            @foreach ($year_level as $yl)
                                                <option value="{{ $yl->classAdvisory->id }}" @selected($selectedGradeLevel == $yl->classAdvisory->id)>
                                                    {{ $yl->classAdvisory->grade_level }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="form-label">SEMESTER</label>
                                        <select name="sem" class="form-control">
                                            <option value="" disabled selected>PLEASE SELECT</option>
                                            @foreach ($sems as $sem)
                                            <option value="{{ $sem }}" @if($semester)
                                            @selected($semester == $sem)
                                            @endif>{{ $sem }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary text-nowrap">SHOW GRADE</button>
                                    </div>
                                </div>
                        </form>
                </div>
                </form>
                <div class="row mt-4">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>SUBJECT</th>
                                    <th>TEACHER</th>
                                    <th>1st GRADING</th>
                                    <th>2nd GRADING</th>
                                    <th>GWA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grades as $grade )
                                    <tr>
                                        <td style="font-size: 0.90rem;">
                                            {{ $grade->classSubject->subject_name }} |
                                            {{ $grade->classSubject->subject_code }}</td>
                                        <td  style="font-size: 0.90rem;">
                                            {{ $grade->classSubject->classTeacher->fullname }}</td>
                                        <td  style="font-size: 0.90rem;">{{ $grade->first_grading }}
                                            @if (!$grade->first_grading)
                                            @elseif ($grade->first_grading >= 75)
                                                <span class="badge bg-label-success">PASSED</span>
                                            @else
                                                <span class="badge bg-label-danger">FAILED</span>
                                            @endif
                                        </td>
                                        <td style="font-size: 0.90rem;">{{ $grade->second_grading }}
                                            @if (!$grade->second_grading)
                                            @elseif ($grade->second_grading >= 75)
                                                <span class="badge bg-label-success">PASSED</span>
                                            @else
                                                <span class="badge bg-label-danger">FAILED</span>
                                            @endif
                                        </td>
                                        <td style="font-size: 0.90rem;">
                                          @if (!$grade->gwa)
                                            @elseif ($grade->second_grading >= 75)
                                                <span class="badge bg-label-success">{{ $grade->gwa }}</span>
                                            @else
                                                <span class="badge bg-label-danger">{{ $grade->gwa }}</span>
                                            @endif
                                      </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">NO DATA! SELECT YEAR LEVEL & SEMESTER TO VIEW GRADES</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">TOTAL GENERAL WEIGHTED AVERAGE</td>
                                    @if (number_format($overall_gwa, 2) != 0.0)
                                        <td width="12%" style="font-size: 0.90rem;">{{ number_format($overall_gwa, 2) }}
                                        </td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
