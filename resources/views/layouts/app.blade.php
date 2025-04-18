<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NgajiDek') }}</title>
        <link rel="icon" href="{{ asset('img/logongajidek2.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>


            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            @if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!',
        text: '{{ session("success") }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

        </div>
    </body>
</html>
