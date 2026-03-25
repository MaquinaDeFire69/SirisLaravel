<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - {{ config('app.name', 'SIRIS') }}</title>
    
    <link rel="shortcut icon" href="{{ asset('Siris.svg') }}" type="image/x-icon">
    <style>
        #auth-right {
            background-color: rgb(231, 228, 239) !important; 
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
                    <h1 class="auth-title">Registrarse.</h1>
                    <p class="auth-subtitle mb-5">Ingresa tus datos para registrarte en nuestro sitio.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Nombre completo" value="{{ old('name') }}" required autofocus autocomplete="name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Correo Electrónico" value="{{ old('email') }}" required autocomplete="username">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Contraseña" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="Confirmar Contraseña" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            {{ __('Registrarse') }}
                        </button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-bold">Inicia sesión</a>.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7 d-none d-lg-block" id="auth-right">
            </div>
        </div>
    </div>

    {{-- Vite JS --}}
    @vite([
        'resources/dist/assets/compiled/js/app.js',
    ])
</body>
</html>