@extends('layouts.master')

@section('title', 'Periodos')

@section('content')
<div class="page-heading">

    <!-- Definir titulo y ruta-->
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Plazos</h3>
                    <p class="text-subtitle text-muted">El presente apartado visualiza la información de los periodos de entrega disponibles</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Configuración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Periodos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Fin titulo y ruta-->

    <div class="card">
        <div class="card-body">

            <h5 class="text-center mb-3">Listado de periodos</h5>

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
                                <span class="badge {{ $p['estatus']=='ACTIVO' ? 'bg-success':'bg-danger' }}">
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

            <!-- FOOTER -->
            <div class="d-flex justify-content-between mt-2">
                <small>
                    Mostrando registros del 1 al {{ count($periodos) }} de un total de {{ count($periodos) }}
                </small>

                <div>
                    <button class="btn btn-sm btn-light">Anterior</button>
                    <button class="btn btn-sm btn-warning">1</button>
                    <button class="btn btn-sm btn-light">2</button>
                    <button class="btn btn-sm btn-light">3</button>
                    <button class="btn btn-sm btn-light">Siguiente</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ================= MODAL EDITAR ================= -->
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Actualizar datos del periodo</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form>

                    <!-- DESCRIPCION -->
                    <div class="mb-3">
                        <label>*Descripción del Periodo:</label>
                        <input type="text" id="editPeriodo" class="form-control">
                    </div>

                    <!-- FILA 1 -->
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

                    <!-- FILA 2 -->
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

                    <!-- BOTONES -->
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

@section('scripts')
<script>
    document.querySelectorAll('.btnEditar').forEach(btn => {
        btn.addEventListener('click', function() {

            document.getElementById('editPeriodo').value = this.dataset.periodo;
            document.getElementById('editInicio').value = this.dataset.inicio;
            document.getElementById('editFin').value = this.dataset.fin;

        });
    });
</script>
@endsection