<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - {{ config('app.name', 'SIRIS') }}</title>
    
    <link rel="shortcut icon" href="{{ asset('Siris.svg') }}" type="image/x-icon">
    <style>
        #auth-right {
            background-color:rgb(231, 228, 239) !important; 
        }
    </style>
    
    @vite([
        'resources/src/assets/scss/app.scss',
        'resources/dist/assets/compiled/css/table-datatable-jquery.css',
    ])
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    
    <div id="auth">
        <div class="row h-100 m-0">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('/Siris.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Ingresar.</h1>
                    <p class="auth-subtitle mb-5">Inicia sesión con los datos de tu cuenta.</p>

                    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                           
                            <input type="email" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus autocomplete="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label text-gray-600" for="remember_me">
                                {{ __('Mantener sesión iniciada') }}
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            {{ __('Iniciar Sesión') }}
                        </button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('register'))
                            <p class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="font-bold">Regístrate</a>.</p>
                        @endif
                        
                        @if (Route::has('password.request'))
                            <p><a class="font-bold" href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7 d-none d-lg-block" id="auth-right">
            </div>
        </div>
    </div>

    {{-- Vite JS: Para la vista de Login no necesitas cargar datatables ni choices.js --}}
    {{-- Solo cargamos los scripts esenciales para que la página cargue rápido --}}
    @vite([
        'resources/dist/assets/compiled/js/app.js',
    ])
</body>
</html>