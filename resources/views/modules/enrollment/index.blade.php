@extends('layouts/app/contentNavbarLayout')

@section('title', 'Enrollment')

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
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header pb-2 d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">ENROLLMENT</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-8 me-2">
                            <input type="text" class="form-control col-md-" placeholder="Search...">
                        </div>
                        <div>
                            <a href="{{ route('enrollment.create') }}" class="btn btn-info text-nowrap">ADD ENROLLMENT</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>ACADEMIC YEAR</th>
                                    <th>START DATE</th>
                                    <th>END DATE</th>
                                    <th>STATUS</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($enrollments as $enrollment)
                                    <tr>
                                        <td style="font-size: 0.90rem;">{{ $enrollment->subject }}</td>
                                        <td style="font-size: 0.90rem;">{{ $enrollment->start->format('F d, Y') }}</td>
                                        <td style="font-size: 0.90rem;">{{ $enrollment->end->format('F d, Y') }}</td>
                                        @if ($enrollment == 'Active')
                                            <td class=""style="font-size: 0.90rem;"><span
                                                    class="badge bg-label-success mt-2">{{ $enrollment->status }}</span>
                                            </td>
                                        @else
                                            <td class=""style="font-size: 0.90rem;"><span
                                                    class="badge bg-label-danger mt-2">{{ $enrollment->status }}</span></td>
                                        @endif

                                        <td>
                                            <a href="{{ route('enrollment.view-app-list', $enrollment->id) }}"
                                                class="btn btn-info btn-sm">APPLICATION LIST</a>
                                            @if ($enrollment->status == 'Active')
                                                <a href="{{ route('enrollment.deactivate', $enrollment->id) }}"
                                                    class="btn btn-warning btn-sm">DEACTIVATE</a>
                                            @endif
                                            <a href="{{ route('enrollment.edit', $enrollment->id) }}"
                                                class="btn btn-primary btn-sm">EDIT</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $enrollment->id }}">
                                                DELETE
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="backDropModal{{ $enrollment->id }}" data-bs-backdrop="static"
                                                tabindex="-1">
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
                                                            <a href="{{ route('enrollment.delete', $enrollment->id) }}"
                                                                type="button" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{-- end modal --}}
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                  <td colspan="5" class="text-center">No enrollment data!</td>
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
