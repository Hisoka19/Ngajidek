<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('dashmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashmin/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('dashmin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashmin/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
