<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"
    integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" /> --}}

<!-- Core CSS -->
{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" /> --}}
<link rel="stylesheet" href="{{ asset('css/core.css') }}">
{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" /> --}}
<link rel="stylesheet" href="{{ asset('css/theme-default.css') }}">
{{-- <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" /> --}}
<link rel="stylesheet" href="{{ asset('css/demo.css') }}">

{{-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.css"
    integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Vendor Styles -->
@yield('vendor-style')

<!-- Page Styles -->
@yield('page-style')
