<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} {{ $web_title ?? config('app.name') }}-Enlace</title>
    <link rel="shortcut icon" href="{{ asset('Siris.svg') }}" type="image/x-icon">

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

    {{-- Sección de estilos adicionales --}}
    @yield('styles')
</head>

<body>
    <!--<script src="{{ asset('/src/assets/static/js/initTheme.js') }}"></script>-->
    {{--
    @vite([
            'resources/src/assets/static/js/initTheme.js',
    ])--}}

    <div id="app">
        <div id="sidebar">
            @include('layouts.enlace.sidebar')
        </div>

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('layouts.topnavbar')

            {{-- ÁREA DE CONTENIDO --}}
            <div id="main-content" class="d-flex flex-column min-vh-100">
                <div class="page-content flex-grow-1">
                    @yield('content')
                </div>

                <div class="mt-auto">
                    @include('partials.footer')
                </div>
            </div>
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