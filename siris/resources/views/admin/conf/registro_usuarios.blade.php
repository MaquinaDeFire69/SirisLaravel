@extends('layouts.admin.master')

@section('title', 'Registro de usuarios')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Configuración / <span style="color: #f39c12;">Usuarios</span></h3>
            <p class="text-subtitle text-muted">Registro de personal administrativo y de enlace.</p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Configuración</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border border-warning" style="border-width: 2px !important;">
        <div class="card-body">
            <h5 class="mb-4" style="color: #4b2a6b; font-weight: bold;">Registrar nuevo usuario:</h5>
            
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Nombre Completo del Usuario:</b></label>
                        <input type="text" name="nombre" class="form-control border-secondary" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Ente Público del Usuario:</b></label>
                        <select name="ente" class="form-select text-dark" style="background-color: #f39c12; border-color: #d35400;" required>
                            <option selected disabled>Seleccione un ente público...</option>
                            <option value="1">Secretaría General</option>
                            <option value="2">Dirección de Finanzas</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Correo Electrónico:</b></label>
                        <input type="email" name="correo" class="form-control border-secondary" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Contraseña:</b></label>
                        <input type="password" name="password" class="form-control border-secondary" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Tipo de Usuario:</b></label>
                        <select name="tipo" class="form-select text-dark" style="background-color: #f39c12; border-color: #d35400;" required>
                            <option selected disabled>Seleccione Tipo de Usuario...</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="ENLACE">ENLACE</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label text-dark"><b><span class="text-danger">*</span> Estatus:</b></label>
                        <select name="estatus" class="form-select text-dark" style="background-color: #f39c12; border-color: #d35400;" required>
                            <option selected disabled>Seleccione Estatus...</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-white py-2 px-4 me-2" style="color: #4b2a6b; border: 1.5px solid #4b2a6b !important; font-weight: 500;">
                        <i class="bi bi-check-circle-fill"></i> Registrar Usuario
                    </button>
                    <button type="reset" class="btn btn-white py-2 px-4" style="color: #4b2a6b; border: 1.5px solid #4b2a6b !important; font-weight: 500;">
                        <i class="bi bi-x-circle-fill"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h5 class="text-center mb-4">Usuarios Registrados</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                    <thead class="table-secondary text-uppercase">
                        <tr>
                            <th>Nombre</th>
                            <th>Ente</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros_usuarios as $user)
                        <tr>
                            <td>{{ $user['nombre'] }}</td>
                            <td class="small">{{ $user['ente'] }}</td>
                            <td>{{ $user['correo'] }}</td>
                            <td>
                                <span class="badge {{ $user['tipo'] == 'ADMINISTRADOR' ? 'bg-primary' : 'bg-info' }}">
                                    {{ $user['tipo'] }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $user['estatus'] == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user['estatus'] }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" title="Editar"><i class="bi bi-pencil-square"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection