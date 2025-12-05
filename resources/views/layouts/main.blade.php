<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BahasaKu') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
        

        <!-- Scripts -->
            {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        
            {{-- Datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

            {{-- Trix Editor --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

            {{-- Tailwind --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            #dashboard-user {
                background-image: url('{{ asset('/images/bg-dashboard-user.png') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body class="">
        <div id="beranda" class="min-h-screen md:flex">
            @include('layouts.sidebar')
            <main class="px-7 md:px-20 pt-[8vh] md:pt-[15vh] w-full">
                @yield('content')
            </main>
        </div>
        @include('layouts.footer')
    </body>
</html>
