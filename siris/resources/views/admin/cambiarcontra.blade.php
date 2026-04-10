@extends('layouts.admin.master')

@section('title', 'Cambiar Contraseña')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-heading">
    <h3>Cambiar contraseña</h3>
</div> 

<div class="page-content"> 
    <section id="basic-horizontal-layouts">
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

                            <form class="form form-horizontal" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <label for="current_password">Contraseña actual</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" id="current_password" class="form-control" name="current_password"
                                                placeholder="Ingrese su contraseña actual">
                                            @error('current_password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label for="password">Nueva contraseña</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="Ingrese la nueva contraseña">
                                            @error('password', 'updatePassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-3">
                                            <label for="password_confirmation">Confirmar contraseña</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                                placeholder="Confirme la nueva contraseña">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Limpiar</button>
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
           'resources/dist/assets/static/js/pages/jquery.js',
           'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',        
    ])
@endsection