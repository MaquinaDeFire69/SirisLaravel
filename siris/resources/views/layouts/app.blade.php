<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIRIS') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/extensions/bootstrap-icons/font/bootstrap-icons.css') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div id="app"> {{-- Mazer necesita este ID --}}
            
            <div id="sidebar" class="active">
                @include(isset($sidebar) ? 'layouts.' . $sidebar : 'layouts.sidebar')
            </div>

            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>

                @isset($header)
                    <header class="bg-white shadow mb-4">
                                            </header>
                @endisset

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
        <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    </body>
</html>