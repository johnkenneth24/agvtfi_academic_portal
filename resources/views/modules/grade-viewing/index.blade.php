@extends('layouts/app/contentNavbarLayout')

@section('title', 'Grades')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('grade.index') }}" method="get">
          <div class="row d-flex align-items-center">
              <div class="col-md-4">
                <form action="{{ route('grade.index') }}" method="get">
                  @csrf
                  <div class="form-group">
                      <select name="grade_level" class="form-control" >
                          <option value="" disabled selected>PLEASE SELECT</option>
                          @foreach ($year_level as $yl)
                          <option value="{{ $yl->classAdvisory->id }}" @selected($selectedGradeLevel == $yl->classAdvisory->id)>{{ $yl->classAdvisory->grade_level }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">SHOW GRADE</button>
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
                  <th>3rd GRADING</th>
                  <th>4th GRADING</th>
                  <th>GWA</th>
                </tr>
              </thead>
              <tbody>
                @forelse($grades as $grade )
                <tr>
                  <td width="18%" style="font-size: 0.90rem;">{{ $grade->classSubject->subject_name }} | {{ $grade->classSubject->subject_code }}</td>
                  <td width="17%" style="font-size: 0.90rem;">{{ $grade->classSubject->classTeacher->fullname}}</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ $grade->first_grading}}
                    @if ($grade->first_grading >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ $grade->second_grading}}
                    @if ($grade->second_grading >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ $grade->third_grading}}
                    @if ($grade->third_grading >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ $grade->fourth_grading}}
                    @if ($grade->fourth_grading >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ $grade->gwa }}
                    @if ($grade->gwa >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif
                  </td>
                  </tr>

                @empty
                <tr>
                  <td colspan="7" class="text-center">SELECT YEAR LEVEL TO VIEW GRADES</td>
                </tr>
                @endforelse
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6" class="text-end fw-bold">TOTAL GENERAL WEIGHTED AVERAGE</td>
                  <td width="12%" style="font-size: 0.90rem;">{{ number_format($overall_gwa, 2) }}
                    @if (number_format($overall_gwa, 2) >= 75)
                    <span class="badge bg-label-success">PASSED</span>
                    @else
                      <span class="badge bg-label-danger">FAILED</span>
                    @endif</td>
                  </td>
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
