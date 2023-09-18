@push('page-style')
    <style>
        .bg-menu-theme .menu-inner>.menu-item.active:before {
            background: #ffff !important;
        }

        .bg-menu-theme .menu-inner>.menu-item.active>.menu-link {
            background-color: rgb(255 255 255 / 20%) !important;
        }
    </style>
@endpush

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
    style="background-color: #006aff !important      ">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo mt-5">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/backgrounds/bg.png') }}" height="60" alt="">
            </span>
            <span class="text-primary fw-bold"
                style="margin-left: 8px; font-size: 15px; color: #ffff !important;">AGVTFI <br> Academic Portal </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-5">
        <li class="menu-item {{ !request()->routeIs('dashboard') ?: 'active' }}">
            <a href="{{ route('dashboard') }}" class=" menu-link" style="color: #ffff">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div>Dashboard</div>
            </a>
        </li>
        @role('admin')
            <li class="menu-item {{ !request()->routeIs('class-section.*') ?: 'active' }}">
                <a href="{{ route('class-section.index') }}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon bx bxs-school"></i>
                    <div>Class Section</div>
                </a>
            </li>
            <li class="menu-item {{ !request()->routeIs('student.*') ?: 'active' }} ">
                <a href="{{ route('student.index') }}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon tf-icons bx bxs-id-card"></i>
                    <div>Student</div>
                </a>
            </li>
            <li class="menu-item {{ !request()->routeIs('teacher.*') ?: 'active' }} ">
                <a href="{{ route('teacher.index') }}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon bx bxs-user-badge"></i>
                    <div>Teacher</div>
                </a>
            </li>
        @endrole
        @role('teacher')
            <li class="menu-item {{-- !request()->routeIs('teacher.*')?:'active' --}} ">
                <a href="{{-- route('teacher.index') --}}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon bx bxs-user-badge"></i>
                    <div>Class Adviser</div>
                </a>
            </li>
            <li class="menu-item {{-- !request()->routeIs('teacher.*')?:'active' --}} ">
                <a href="{{-- route('teacher.index') --}}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon bx bxs-user-badge"></i>
                    <div>Class Subject</div>
                </a>
            </li>
        @endrole
        @role('student')
            <li class="menu-item {{-- !request()->routeIs('teacher.*')?:'active' --}} ">
                <a href="{{-- route('teacher.index') --}}" class=" menu-link" style="color: #ffff">
                    <i class="menu-icon bx bxs-user-badge"></i>
                    <div>Grades</div>
                </a>
            </li>
        @endrole
    </ul>

</aside>
