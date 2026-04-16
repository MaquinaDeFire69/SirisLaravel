@extends('layouts.admin.master')

@section('title', 'Plazos informes')

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
                El presente apartado permite gestionar los plazos de entrega de informes
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Plazos informes</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">Listado de plazos</h5>
                    </div>

                    <div class="col-md-6 text-end">
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevo">
                            <i class="bi bi-plus-square"></i> Registrar plazo
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>Año</th>
                                <th>Días</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($plazos as $index => $plazo)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $plazo['anio'] }}</td>
                                <td>{{ $plazo['dias'] }}</td>
                                <td>
                                    <span class="badge {{ $plazo['estatus']=='ACTIVO'?'bg-success':'bg-danger' }}">
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


<div class="modal fade" id="modalNuevo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Registrar plazo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span> Año</label>
                            <input type="number" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label><span class="text-danger">*</span> Días</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label><span class="text-danger">*</span> Estatus</label>
                        <select class="form-select">
                            <option value="">Seleccione</option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Guardar
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


<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Actualizar plazo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('conf.plazo_informe.actualizar') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span> Año</label>
                            <input type="number" name="anio" id="editAnio" class="form-control" value="{{ old('anio') }}">
                        </div>

                        <div class="col-md-6">
                            <label><span class="text-danger">*</span> Días</label>
                            <input type="number" name="dias" id="editDias" class="form-control" value="{{ old('dias') }}">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label><span class="text-danger">*</span> Estatus</label>
                        <select name="estatus" id="editEstatus" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="ACTIVO" {{ old('estatus') == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ old('estatus') == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Actualizar Plazo
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
            document.getElementById('editAnio').value = this.dataset.anio;
            document.getElementById('editDias').value = this.dataset.dias;
            document.getElementById('editEstatus').value = this.dataset.estatus;
        });
    });

    // Abrir modal automáticamente si hay errores de validación
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('error_campos'))
            var modalEditar = new bootstrap.Modal(document.getElementById('modalEditar'));
            modalEditar.show();
        @endif
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