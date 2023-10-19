@extends('layouts/app/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
        <div class="row">
          <div class="col-md-4">
           <div class="form-group">
            <label for="">GRADE LEVEL</label>
            <select name="" class="form-control" id="">
              <option value="">GRADE 7</option>
              <option value="">GRADE 8</option>
              <option value="">GRADE 9</option>
              <option value="">GRADE 10</option>

            </select>
           </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label for="">GRADING SEMESTER</label>
             <select name="" class="form-control" id="">
               <option value="">1ST GRADING</option>
               <option value="">2ND GRADING</option>
               <option value="">3RD GRADING</option>
               <option value="">4TH  GRADING</option>

             </select>
            </div>
           </div>
        </div>
        <div class="row mt-4">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>SUBJECT</th>
                  <th>TEACHER</th>
                  <th>GRADE</th>
                  <th>REMARKS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="font-size: 0.90rem;">SCIENCE</td>
                  <td style="font-size: 0.90rem;">JUAN SANTOS</td>
                  <td style="font-size: 0.90rem;">90</td>
                  <td style="font-size: 0.90rem;"><span class="badge bg-label-success me-1">PASSED</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
