
            <style>
                .logout:hover{
                    background-color: #dc3545 !important; /* Fondo rojo */
                    color: #ffffff !important; /* Texto blanco */
                }
            </style>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top custom-navbar">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3" style="color: #5a4b81;"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                            <div class="mx-auto">
                                <h1 class="mb-0 siris-title">SIRIS</h1>
                            </div>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex align-items-center text-decoration-none">
                                    <h6 class="mb-0 user-dropdown-text me-1 lh-1">Administrador del sistema</h6>
                                    <i class="bi bi-caret-down-fill fs-5 lh-1 d-flex align-items-center"></i>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton" style="border: 1px solid #5a4b81;">
                                    <li>
                                        <a class="dropdown-item dropdown-menu-custom d-flex align-items-center" href="#">
                                            <i class="bi bi-key-fill me-2"></i> Cambiar Contraseña
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item dropdown-menu-custom d-flex align-items-center logout" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="bi bi-box-arrow-right me-2"></i> {{ __('Cerrar Sesión') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </nav>
            </header>