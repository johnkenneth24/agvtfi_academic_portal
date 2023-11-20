@extends('layouts/app/contentNavbarLayout')

@section('title', 'PERMAMENT RECORD')

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
                        <h5 class="card-title mb-0 text-uppercase">PERMAMENT RECORD</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-7 me-2">
                            {{-- <input type="text" class="form-control col-md-" placeholder="Search..."> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body mt-2">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="">ACADEMIC YEAR</th>
                                    <th class="">SUBJECT CODE</th>
                                    <th class="">SUBJECT NAME</th>
                                    <th class="">GWA</th>
                                    <th class="">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              @forelse($subGrades as $grade)
                              <tr>
                                <td class="" style="font-size: 0.90rem;">
                                  @foreach ($class as $classItem)
                                      @if ($grade->classSubject->year_section_id == $classItem->id)
                                          {{ $classItem->academic_year }}
                                      @endif
                                  @endforeach
                              </td>

                                <td class="" style="font-size: 0.90rem;">{{ $grade->classSubject->subject_code }}</td>
                                <td class="" style="font-size: 0.90rem;">{{ $grade->classSubject->subject_name }}</td>
                                <td class="" style="font-size: 0.90rem;">{{ $grade->gwa }}</td>
                                <td class="" style="font-size: 0.90rem;">
                                  @if ($grade->gwa >= 75)
                                  <span class="badge bg-label-success">PASSED</span>
                                  @else
                                    <span class="badge bg-label-danger">FAILED</span>
                                  @endif
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
