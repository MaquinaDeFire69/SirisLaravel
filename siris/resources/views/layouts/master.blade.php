<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} - {{ $web_title ?? config('app.name') }}</title>

    {{-- Sección para estilos antes --}}
    @yield('stylesfirst')

    {{-- Vite CSS --}}
    @vite([
        'resources/src/assets/scss/app.scss',
        'resources/dist/assets/extensions/choices.js/public/assets/styles/choices.css',
        'resources/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'resources/src/assets/scss/pages/datatables.scss',
        'resources/dist/assets/compiled/css/table-datatable-jquery.css',
    ])
<!--'resources/src/assets/scss/themes/dark/app-dark.scss'!-->
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">

    {{-- Sección de estilos adicionales --}}
    @yield('styles')
</head>

<body>
    <!--<script src="{{ asset('/src/assets/static/js/initTheme.js') }}"></script>-->
    @vite([
            'resources/src/assets/static/js/initTheme.js',
    ])

    <div id="app">
        <div id="sidebar">
            @include('layouts.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3">SIRIS</i>
                </a>
            </header>

            {{-- Contenido principal --}}
            @yield('content')
           
            @include('partials.footer')
        </div>
    </div>

   <!-- <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>-->
    <!--<script src="{{ asset('/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>-->
    <!--<script src="{{ asset('/dist/assets/compiled/js/app.js') }}"></script>-->
    @vite([
            'resources/dist/assets/compiled/js/app.js',
            'resources/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js',
            'resources/dist/assets/extensions/choices.js/public/assets/scripts/choices.js',
            'resources/dist/assets/static/js/pages/form-element-select.js',
            'resources/dist/assets/extensions/jquery/jquery.min.js',
            'resources/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js',
            'resources/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js',
            'resources/dist/assets/static/js/pages/datatables.js',
    ])


    {{-- JS adicional por página --}}
    @yield('js')
</body>
</html>