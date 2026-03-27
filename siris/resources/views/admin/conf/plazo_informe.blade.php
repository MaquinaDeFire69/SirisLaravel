@extends('layouts.master')

@section('title', 'Plazos informes')

@section('content')
<div class="page-heading">

    <!-- TITULO -->
    <!-- Definir titulo y ruta-->
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Plazos</h3>
                    <p class="text-subtitle text-muted">El presente apartado visualiza la información de los plazos de entrega disponibles</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Configuración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Plazos informes</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Fin titulo y ruta-->
    <!-- CARD -->
    <div class="card">
        <div class="card-body">

            <h5 class="text-center mb-3">Listado de plazos</h5>

            <!-- BOTON + FILTROS -->
            <div class="d-flex justify-content-between align-items-center mb-2">

                <!-- BOTON -->
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNuevo">
                    <i class="bi bi-plus-square"></i> Nuevo plazo
                </button>

                 
            </div>

            <!-- BUSCADOR -->
            <div class="d-flex justify-content-between mb-2">
                <div>
                    Mostrar 
                    <select class="form-select d-inline-block" style="width: 80px;">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                    </select>
                    Registros
                </div>

                <div>
                    Buscar:
                    <input type="text" class="form-control d-inline-block" style="width: 200px;">
                </div>
            </div>

            <!-- TABLA -->
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>AÑO DE APLICACIÓN</th>
                            <th>PLAZO EN DÍAS</th>
                            <th>ESTATUS</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plazos as $index => $plazo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $plazo['anio'] }}</td>
                                <td>{{ $plazo['dias'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $plazo['estatus'] == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $plazo['estatus'] }}
                                    </span>
                                </td>
                                <td>
                                    <button 
    class="btn btn-sm btn-outline-primary btnEditar"
    data-bs-toggle="modal" 
    data-bs-target="#modalEditar"
    data-anio="{{ $plazo['anio'] }}"
    data-dias="{{ $plazo['dias'] }}"
    data-estatus="{{ $plazo['estatus'] }}"
>
    <i class="bi bi-pencil-square"></i> Actualizar
</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- FOOTER TABLA -->
            <div class="d-flex justify-content-between mt-2">
                <small>
                    Mostrando registros del 1 al {{ count($plazos) }} de un total de {{ count($plazos) }}
                </small>

                <div>
                    <button class="btn btn-sm btn-light">Anterior</button>
                    <button class="btn btn-sm btn-warning">1</button>
                    <button class="btn btn-sm btn-light">Siguiente</button>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="modal fade" id="modalNuevo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Registrar nuevo plazo:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>* Año de aplicación:</label>
                            <input type="number" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>* Plazo en días:</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>* Estatus:</label>
                        <select class="form-select">
                            <option selected disabled>Seleccione Estatus...</option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Registrar Plazo
                        </button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Actualizar plazo:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>* Año de aplicación:</label>
                            <input type="number" id="editAnio" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>* Plazo en días:</label>
                            <input type="number" id="editDias" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>* Estatus:</label>
                        <select id="editEstatus" class="form-select">
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Actualizar Plazo
                        </button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const botonesEditar = document.querySelectorAll('.btnEditar');

    botonesEditar.forEach(btn => {
        btn.addEventListener('click', function () {

            document.getElementById('editAnio').value = this.dataset.anio;
            document.getElementById('editDias').value = this.dataset.dias;
            document.getElementById('editEstatus').value = this.dataset.estatus;

        });
    });

});
</script>
@endsection