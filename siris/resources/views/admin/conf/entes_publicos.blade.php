@extends('layouts.admin.master')

@section('title', 'Entes públicos')

@section('content')
<div class="page-heading">

    <!-- TITULO -->
    <!-- Definir titulo y ruta-->
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Entes públicos</h3>
                    <p class="text-subtitle text-muted">El presente apartado visualiza la información de los entes públicos disponibles</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Configuración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Plazos informes</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Fin titulo y ruta-->
    <!-- CARD -->
    <div class="card">
        <div class="card-body">

            <h5 class="text-center mb-3">Listado de entes públicos</h5>

            <!-- BOTON + FILTROS -->
            <div class="d-flex justify-content-between align-items-center mb-2">

                <!-- BOTON -->
               <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#nuevoEnte">
                        <i class="bi bi-plus"></i> Exportar entes públicos
                    </button>

                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#validarEnte">
                        <i class="bi bi-list"></i> Validar entes públicos
                    </button>
                </div>

                <!-- BUSCADOR -->
                <div>
                    <label>Buscar:</label>
                    <input type="text" class="form-control d-inline-block" style="width: 200px;">
                </div>
            </div>

            <!-- MOSTRAR REGISTROS -->
            <div class="mb-2">
                Mostrar 
                <select class="form-select d-inline-block" style="width: 80px;">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                Registros
            </div>

            <!-- TABLA -->

                <div class="table-responsive ">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ente público</th>
                                <th>Id_S3</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entes as $index => $ente)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $ente['nombre'] }}</td>
                                            <td>{{ $ente['id_s3'] }}</td>
                                            <td>
                                                <span class="badge {{ $ente['estatus'] == 'Activo' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $ente['estatus'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach       
                        </tbody>
                    </table>
                </div>
          

            <!-- FOOTER TABLA -->
            <div class="d-flex justify-content-between mt-2">
                <small>
                    Mostrando registros del 1 al {{ count($entes) }} de un total de {{ count($entes) }}
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

<div class="modal fade" id="nuevoEnte" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Registrar nuevo ente:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>* Nombre:</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>* ID S3:</label>
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
                            <i class="bi bi-check-circle"></i> Registrar ente
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


<div class="modal fade" id="validarEnte" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Validar ente:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>
                    <div class="row mb-3">
                         <div class="col-md-6">
                            <label>* Nombre:</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>* ID S3:</label>
                            <input type="number" class="form-control">
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
                            <i class="bi bi-check-circle"></i> Validar ente
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