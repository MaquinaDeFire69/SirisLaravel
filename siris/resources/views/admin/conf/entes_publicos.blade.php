@extends('layouts.admin.master')

@section('title', 'Entes públicos')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.css',
])
@endsection

@section('content')
<div class="page-title">

    <!-- TITULO -->
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Entes públicos</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los entes públicos disponibles
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('panel-informativo') }}">Configuración</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Entes públicos
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Listado de entes públicos
                    </h5>
                </div>

                <div class="card-body">

                    <!-- BOTONES -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#nuevoEnte">
                                <i class="bi bi-plus-square"></i> Exportar entes públicos
                            </button>

                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#validarEnte">
                                <i class="bi bi-list"></i> Validar entes públicos
                            </button>
                        </div>
                    </div>

                    <!-- TABLA -->
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="bg-light">
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

                </div>
            </div>
        </section>
    </div>

</div>


<!-- MODAL EXPORTAR -->
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


<!-- MODAL VALIDAR -->
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
                        <select class="form-select">
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

    $('#table1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: 0 }
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