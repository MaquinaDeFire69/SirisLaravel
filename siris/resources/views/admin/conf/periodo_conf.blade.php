@extends('layouts.admin.master')

@section('title', 'Periodos')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
])
@endsection

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Configuración</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los periodos de entrega disponibles
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Periodos</li>
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
                    Listado de periodos
                </h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table text-center" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>Periodo</th>
                                <th>Inicio reporte</th>
                                <th>Fin reporte</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($periodos as $i => $p)
                            <tr class="fs-6">
                                <td><small>{{ $i+1 }}</small></td>
                                <td><small>{{ $p['periodo'] }}</small></td>
                                <td><small>{{ $p['inicio'] }}</small></td>
                                <td><small>{{ $p['fin'] }}</small></td>
                                <td>
                                    <span class="badge {{ $p['estatus']=='ACTIVO' ? 'bg-success':'bg-danger' }}">
                                        <small>{{ $p['estatus'] }}</small>
                                    </span>    
                                </td>
                                <td>
                                    <button 
                                        class="btn btn-sm btn-outline-primary btnEditar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar"
                                        data-periodo="{{ $p['periodo'] }}"
                                        data-inicio="{{ $p['inicio'] }}"
                                        data-fin="{{ $p['fin'] }}"
                                    >
                                        <small><i class="bi bi-pencil-square"></i> Actualizar</small>
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

<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Actualizar datos del periodo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('conf.periodo_informe.actualizar') }}">
                    @csrf

                    <div class="mb-3">
                        <label><span class="text-danger">*</span>Descripción del Periodo:</label>
                        <input type="text" name="periodo" id="editPeriodo" class="form-control" value="{{ old('periodo') }}">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Inicio Periodo:</label>
                            <input type="date" name="inicio" id="editInicio" class="form-control" value="{{ old('inicio') }}">
                        </div>

                        <div class="col-md-6">
                            <label>Fin Periodo:</label>
                            <input type="date" name="fin" id="editFin" class="form-control" value="{{ old('fin') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Inicio Reportes:</label>
                            <input type="date" name="inicio_reportes" class="form-control" value="{{ old('inicio_reportes') }}">
                        </div>

                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Fin Reportes:</label>
                            <input type="date" name="fin_reportes" class="form-control" value="{{ old('fin_reportes') }}">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Actualizar Periodo
                        </button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle-fill"></i> Cancelar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btnEditar').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('editPeriodo').value = this.dataset.periodo;
        document.getElementById('editInicio').value = this.dataset.inicio;
        document.getElementById('editFin').value = this.dataset.fin;
    });
});

// Abrir modal automáticamente si hay errores de validación
document.addEventListener('DOMContentLoaded', function () {
    @if(session('error_campos'))
        var modalEditar = new bootstrap.Modal(document.getElementById('modalEditar'));
        modalEditar.show();
    @endif
});

$(document).ready(function () {
    $('#table1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
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

@if(session('error_campos'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Campos obligatorios',
    html: `Debes proporcionar:<br><br>{!! implode("<br>", session('error_campos')) !!}`
});
</script>
@endif

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Éxito',
    text: "{{ session('success') }}"
});
</script>
@endif

@endsection