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
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title mb-0">
                        <h5 class="card-title mb-0 text-uppercase">USER LIST</h5>
                    </div>
                    <div class="card-tools d-flex justify-content-end">
                        <div class="col-md-9 me-2">
                            <input readonly  type="text" class="form-control col-md-3" placeholder="Search...">
                        </div>
                        {{-- <a href="{{ route('user.create') }}" class="btn btn-info">ADD NEW user</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>SCHOOL ID</th>
                                    <th>FULL NAME</th>
                                    <th>ROLE</th>
                                    <th>E-MAIL</th>
                                    <th>Contact No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($users as $user)
                                    <tr>
                                        <td style="font-size: 0.90rem;">{{ $user->school_id }}</td>
                                        <td style="font-size: 0.90rem;">{{ $user->full_name }}</td>
                                        <td style="font-size: 0.90rem;">
                                            @if ($user->hasRole('student'))
                                                Student
                                            @elseif ($user->hasRole('teacher'))
                                                Teacher
                                            @else
                                                No Role
                                            @endif
                                        </td>
                                        <td style="font-size: 0.90rem;">{{ $user->email }}</td>
                                        <td style="font-size: 0.90rem;">{{ $user->contact_number }}</td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#backDropModal{{ $user->id }}">
                                                VIEW INFORMATION
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="backDropModal{{ $user->id }}"
                                                data-bs-backdrop="static" tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <form class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-primary text-uppercase" id="backDropModalTitle">
                                                              {{ implode(', ', $user->getRoleNames()->toArray()) }} | PERSONAL INFORMATION</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body mb-3">
                                                            <div class="row g-2">
                                                                <div class="col mb-3">
                                                                    <label for="nameBackdrop" class="form-label">FIRST
                                                                        Name</label>
                                                                    <input readonly  type="text" value="{{ $user->firstname }}"
                                                                        id="nameBackdrop" class="form-control"
                                                                        placeholder="Enter Name">
                                                                </div>
                                                                <div class="col mb-3">
                                                                    <label for="nameBackdrop" class="form-label">MIDDLE
                                                                        Name</label>
                                                                    <input readonly  type="text" id="nameBackdrop"
                                                                        value="{{ $user->middlename }}"
                                                                        class="form-control" placeholder="Enter Name">
                                                                </div>
                                                                <div class="col mb-3">
                                                                    <label for="nameBackdrop" class="form-label">LAST
                                                                        Name</label>
                                                                    <input readonly  type="text" id="nameBackdrop"
                                                                        value="{{ $user->lastname }}" class="form-control"
                                                                        placeholder="Enter Name">
                                                                </div>
                                                                <div class="col-1 mb-3">
                                                                    <label for="nameBackdrop"
                                                                        class="form-label">EXT.</label>
                                                                    <input readonly  type="text" id="nameBackdrop"
                                                                        value="{{ $user->suffix }}" class="form-control"
                                                                        placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col mb-0">
                                                                    <label for="emailBackdrop"
                                                                        class="form-label">birthdate</label>
                                                                    <input readonly  type="date"
                                                                        value="{{ $user->birthdate->format('Y-m-d') }}"
                                                                        id="emailBackdrop" class="form-control"
                                                                        placeholder="xxxx@xxx.xx">
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="emailBackdrop"
                                                                        class="form-label">age</label>
                                                                    <input readonly  type="email" id="emailBackdrop"
                                                                        value="{{ $user->age }}" class="form-control"
                                                                        placeholder="xxxx@xxx.xx">
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="dobBackdrop"
                                                                        class="form-label">gender</label>
                                                                    <input readonly  type="text" id="dobBackdrop"
                                                                        value="{{ $user->gender }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                              <div class="col mb-0">
                                                                  <label for="emailBackdrop"
                                                                      class="form-label">contact no.</label>
                                                                  <input readonly  type="text"
                                                                      value="{{ $user->contact_number }}"
                                                                      id="emailBackdrop" class="form-control"
                                                                      placeholder="xxxx@xxx.xx">
                                                              </div>
                                                              <div class="col mb-0">
                                                                  <label for="emailBackdrop"
                                                                      class="form-label">email</label>
                                                                  <input readonly  type="email" id="emailBackdrop"
                                                                      value="{{ $user->email }}" class="form-control"
                                                                      placeholder="xxxx@xxx.xx">
                                                              </div>
                                                            </div>
                                                            <div class="row g-2">
                                                              <div class="col mb-0">
                                                                  <label for="dobBackdrop"
                                                                      class="form-label">address</label>
                                                                  <input readonly  type="text" id="dobBackdrop"
                                                                      value="{{ $user->address }}" class="form-control">
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
