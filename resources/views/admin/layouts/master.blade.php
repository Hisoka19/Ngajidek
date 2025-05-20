<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Load CSS -->
    <link href="{{ asset('dashmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashmin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Load Font Awesome & Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Content Start -->
        <div class="content">
            @yield('content')
        </div>
        <!-- Content End -->

        <!-- Footer -->
        @include('admin.layouts.footer')
    </div>

    <!-- Load JS -->
    <script src="{{ asset('dashmin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashmin/js/script.js') }}"></script>
</body>
</html>
