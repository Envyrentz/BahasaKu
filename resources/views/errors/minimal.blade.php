<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
        

        <!-- Scripts -->

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        {{-- Tailwind --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div id="beranda" class="min-h-screen">
            <main>
                <div class="min-h-screen w-full h-full flex justify-center items-center bg-slate-300/70">
                    <div class="w-full h-screen flex items-end p-5">
                        <div class="w-full flex items-end">
                            <img class="text-center w-[20%] md:w-[8%]" src="{{ asset('images/pattern-stand.png') }}" alt="error">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-5">
                        <p class="text-center text-9xl">@yield('code')</p>
                        <p class="text-center text-4xl">@yield('message')</p>
                        <img class="text-center" src="{{ asset('images/error.png') }}" alt="error">
                        <a href="/" class="text-center text-3xl rounded-lg border-2 text-blue-600 border-blue-600 p-2">Kembali ke beranda</a>
                    </div>
                    <div class="w-full flex justify-end  h-screen">
                        <div class="w-full flex flex-col items-end">
                            <img class="text-center w-[100vw] md:w-[35%] p-5" src="{{ asset('images/pattern-right.png') }}" alt="error">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
