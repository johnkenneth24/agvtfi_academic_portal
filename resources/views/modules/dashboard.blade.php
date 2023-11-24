@extends('layouts/app/contentNavbarLayout')

@section('title', 'Dashboard')

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
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hi {{ auth()->user()->full_name }}! 🎉</h5>
                            @role('admin')
                                <p class="mb-4">Monitor your users now. Be productive!</p>
                            @endrole
                            @role('student')
                                <p class="mb-2">Check your acads status now. Be productive!</p>
                                <h5 class="card-title text-primary">{{ $current_year->year_level }}</h5>
                            @endrole
                            @role('teacher')
                                <p class="mb-4">Manage your student and monitor their academic performance. Be productive!</p>
                            @endrole
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @unlessrole('teacher')
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                            <img class="img-fluid w-20"
                                src="{{ asset('assets/img/illustrations/sitting-girl-with-laptop-dark.png') }}"
                                alt="Card girl image">
                        </div>
                        @if ($enrollment !== null)
                            @if (now()->format('Y-m-d') < $enrollment->start->format('Y-m-d'))
                                <h4 class="mb-2 pb-1">Upcoming Enrollment!</h4>
                                <p class="small">Application for enrollment will be activated on the date mentioned below.</p>
                                <div class="row mb-3 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-2">
                                                <span class="avatar-initial rounded bg-label-primary"
                                                    style="font-size: 10px;">START</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap">{{ $enrollment->start->format('d M Y') }}</h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-2">
                                                <span class="avatar-initial rounded bg-label-primary"
                                                    style="font-size: 10px;">END</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap">{{ $enrollment->end->format('d M Y') }}</h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif(
                                $enrollment->start->format('Y-m-d') <= now()->format('Y-m-d') &&
                                    $enrollment->end->format('Y-m-d') >= now()->format('Y-m-d'))
                                <h4 class="mb-2 pb-1">Enroll Now!</h4>
                                <p class="small">Application for enrollment has now started. Fill out the form before the
                                    expiration date.</p>
                                <div class="row mb-3 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-2">
                                                <span class="avatar-initial rounded bg-label-primary"
                                                    style="font-size: 10px;">START</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap">{{ $enrollment->start->format('d M Y') }}</h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-2">
                                                <span class="avatar-initial rounded bg-label-primary"
                                                    style="font-size: 10px;">END</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap">{{ $enrollment->end->format('d M Y') }}</h6>
                                                <small>Date</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @role('student')
                                    <!-- Button trigger modal -->
                                    @if (!$pending_year)
                                        <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal"
                                            data-bs-target="#backDropModal">
                                            Enroll Now!
                                        </button>
                                    @else
                                        <span class="badge bg-warning col-md-12 py-2">DONE ENROLLING</span>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="backDropModalTitle">Enroll Now!</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('enrollment.store-enrollee') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="nameBackdrop" class="form-label">CURRENT GRADE
                                                                    LEVEL</label>
                                                                <input type="text" id="nameBackd nrop"
                                                                    value="{{ $current_year->year_level }}" class="form-control"
                                                                    readonly placeholder="Enter Name">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="nameBackdrop" class="form-label">GRADE LEVEL TO
                                                                    ENROLL</label>
                                                                <input type="text" id="nameBackd nrop" name="grade_level"
                                                                    value="{{ $current_year->year_level + 1 }}"
                                                                    class="form-control" placeholder="Enter Name">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endrole
                            @else
                                <h4 class="mb-2 pb-1">No upcoming enrollment!</h4>
                                <p class="small">We will inform you soon.</p>
                            @endif
                        @else
                            <h4 class="mb-2 pb-1">No upcoming enrollment!</h4>
                            <p class="small">We will inform you soon.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endunlessrole
        <div class="col-md-8 order-4 order-lg-3 ">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Announcement!</h5>
                </div>
                <div class="card-body">
                    <!-- Activity Timeline -->
                    <ul class="timeline">
                        @forelse ($anns as $ann)
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">{{ $ann->subject }}</h6>
                                        <small class="text-muted">{{ $ann->date->format('F d, Y') }} </small>
                                        <p class="mb-2">{!! $ann->description !!}</p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point-wrapper"><span
                                        class="timeline-point timeline-point-primary"></span></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-1">
                                        <h6 class="mb-0">No announcement today!</h6>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                    <!-- /Activity Timeline -->
                </div>
            </div>
        </div>
    </div>
@endsection
