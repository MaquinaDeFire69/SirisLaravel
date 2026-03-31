<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 No Encontrado - SIRIS</title>
    
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

    {{-- Estilos de respaldo para centrar la página de error --}}
    <style>
        #error {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f7ff; /* Fondo claro característico del template */
        }
        .error-title {
            font-size: 3rem;
            font-weight: 700;
            margin-top: 1.5rem;
            color: #25396f; /* Tono azul oscuro del template */
        }
        .img-error {
            width: 100%;
            max-width: 400px;
            height: auto;
        }
        /* Ajuste para modo oscuro si tu template lo usa */
        html[data-bs-theme="dark"] #error {
            background-color: #151521;
        }
        html[data-bs-theme="dark"] .error-title {
            color: #fff;
        }
    </style>
</head>

<body>
    {{-- Script de inicialización del tema (Modo claro/oscuro) --}}
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    <div id="error">
        <div class="error-page container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12 text-center">
                    
                    {{-- Imagen 404: Asegúrate de tener este SVG en tu carpeta public, o cámbialo por un asset tuyo --}}
                    <img class="img-error" src="{{ asset('error/error-404.svg') }}" alt="Página no encontrada">
                    
                    <h1 class="error-title">ERROR 404</h1>
                    <p class='fs-5 text-gray-600 mt-2'>La página que estás buscando no existe o ha sido movida.</p>
                    
                    {{-- Botón para regresar, url('/') te enviará al index/login dependiendo de tu lógica --}}
                    <a href="{{ route('panel-informativo') }}" class="btn btn-lg btn-outline-primary mt-4">Volver al inicio</a>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- Vite JS --}}
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