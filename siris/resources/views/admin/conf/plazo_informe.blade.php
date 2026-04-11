@extends('layouts.admin.master')

@section('title', 'Plazos informes')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.css',
])
@endsection

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Plazos</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los plazos de entrega disponibles
            </p>
        </div>

        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('panel-informativo') }}">Configuración</a>
                    </li>
                    <li class="breadcrumb-item active">Plazos informes</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<br>

<div class="page-content">

<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Listado de plazos
            </h5>
        </div>

        <div class="card-body">

            <!-- BOTON NUEVO -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNuevo">
                    <i class="bi bi-plus-square"></i> Nuevo plazo
                </button>
            </div>

            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="bg-light">
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
                                <span class="badge {{ $plazo['estatus'] == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
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

        </div>
    </div>
</section>

</div>


<!-- MODAL NUEVO -->
<div class="modal fade" id="modalNuevo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title text-primary">Nuevo plazo</h5>
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
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Guardar
                        </button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<!-- MODAL EDITAR -->
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
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary">
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

@endsection


@section('js')

@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])

<script>
$(document).ready(function(){

    $('.btnEditar').on('click', function(){

        $('#editAnio').val($(this).data('anio'));
        $('#editDias').val($(this).data('dias'));
        $('#editEstatus').val($(this).data('estatus'));

    });

    $('#table1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: [0,4] }
        ],
        language: {
            lengthMenu: "_MENU_ registros por página",
            search: "Buscar:",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            zeroRecords: "No se encontraron resultados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "›",
                previous: "‹"
            }
        }
    });

});
</script>

@endsection