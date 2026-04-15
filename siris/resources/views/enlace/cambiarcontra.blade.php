@extends('layouts.enlace.master')

@section('title', 'Cambiar Contraseña')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Mi cuenta</h3>
            <p class="text-subtitle text-muted">
                El presente apartado permite actualizar la contraseña de tu cuenta
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Cambiar contraseña</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content"> 
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success alert-dismissible show fade">
                                    ¡Tu contraseña ha sido actualizada exitosamente!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="form" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        
                                        <div class="col-12 form-group mb-3">
                                            <label for="current_password" class="form-label"> <span class="text-danger">*</span> Contraseña actual</label>
                                            <input type="password" id="current_password" class="form-control" name="current_password"
                                                placeholder="Ingrese su contraseña actual" required>
                                            @error('current_password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 form-group mb-3">
                                            <label for="password" class="form-label"> <span class="text-danger">*</span> Nueva contraseña</label>
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Ingrese la nueva contraseña" required>
                                            @error('password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 form-group mb-3">
                                            <label for="password_confirmation" class="form-label"> <span class="text-danger">*</span> Confirmar contraseña</label>
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                                placeholder="Confirme la nueva contraseña" required>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-4">
                                            <button type="submit" class="btn btn-primary me-2 mb-1 btn-sm" style="width: 120px;">
                                                <i class="bi bi-pencil-square"></i> Actualizar
                                            </button>
                                            <a href="{{ route('enlace.panel_informativo') }}" class="btn btn-secondary mb-1 btn-sm" style="width: 120px;">
                                                <i class="bi bi-x-circle-fill"></i> Cancelar
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    @vite(['resources/dist/assets/static/js/pages/dashboard.js',      
    ])
@endsection