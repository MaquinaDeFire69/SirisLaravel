@extends('layouts.admin.master')

@section('title', 'Periodos')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
])
@endsection

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Periodo</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los periodos de entrega disponibles
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('panel-informativo') }}">Configuración</a>
                    </li>
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
                                <th>PERIODO</th>
                                <th>INICIO REPORTE</th>
                                <th>FIN REPORTE</th>
                                <th>ESTATUS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($periodos as $i => $p)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $p['periodo'] }}</td>
                                <td>{{ $p['inicio'] }}</td>
                                <td>{{ $p['fin'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $p['estatus']=='ACTIVO' ? 'bg-success':'bg-danger' }}">
                                        {{ $p['estatus'] }}
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
                                        data-estatus="{{ $p['estatus'] }}"
                                    >
                                        Actualizar
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

{{-- MODAL EDITAR --}}
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Actualizar datos del periodo</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>

                    <div class="mb-3">
                        <label>*Descripción del Periodo:</label>
                        <input type="text" id="editPeriodo" class="form-control">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Inicio Periodo:</label>
                            <div class="d-flex">
                                <input type="date" id="editInicio" class="form-control">
                                <button class="btn btn-dark ms-2">Elegir</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Fin Periodo:</label>
                            <div class="d-flex">
                                <input type="date" id="editFin" class="form-control">
                                <button class="btn btn-dark ms-2">Elegir</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>*Inicio Reportes:</label>
                            <div class="d-flex">
                                <input type="date" class="form-control">
                                <button class="btn btn-dark ms-2">Elegir</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>*Fin Reportes:</label>
                            <div class="d-flex">
                                <input type="date" class="form-control">
                                <button class="btn btn-dark ms-2">Elegir</button>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary">
                            ✔ Actualizar Periodo
                        </button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            ✖ Cancelar
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
])

<script>
document.querySelectorAll('.btnEditar').forEach(btn => {
    btn.addEventListener('click', function() {

        document.getElementById('editPeriodo').value = this.dataset.periodo;
        document.getElementById('editInicio').value = this.dataset.inicio;
        document.getElementById('editFin').value = this.dataset.fin;

    });
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

@endsection