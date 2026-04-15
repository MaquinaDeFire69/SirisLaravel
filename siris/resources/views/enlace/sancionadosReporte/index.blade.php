@extends('layouts.enlace.master')

@section('title', 'Listado de Sancionados')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.css',
])
@endsection

@section('content')

{{-- Siempre debe estar presente --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Sancionados</h3>
            <p class="text-subtitle text-muted">
                El presente apartado muestra registros oficiales de sanciones correspondientes al periodo seleccionado.
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<br>

<div class="page-content">

    {{-- FILTROS --}}
    <section class="basic-choices">
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Año</h6>
                        <select class="form-select text-dark fw-bold" id="filtroEjercicio">
                            <option value="">Todos</option>
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <h6>Mes</h6>
                        <select class="form-select text-dark fw-bold" id="filtroPeriodo">
                            <option value="">Seleccionar...</option>
                            <option value="ENERO">Enero</option>
                            <option value="FEBRERO">Febrero</option>
                            <option value="MARZO">Marzo</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6>Buscar</h6>
                        <input type="text" id="inputBusquedaReal" class="form-control text-dark fw-bold" placeholder="Nombre o expediente...">
                    </div>
                </div>

                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6 mb-2 text-center">
                        <button id="btnBuscar" class="btn btn-primary me-2 btn-sm">
                            <i class="bi bi-search me-2"></i>
                            Buscar
                        </button>
                    
                        <button id="btnLimpiar" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-counterclockwise me-2"></i>
                            Limpiar filtros de búsqueda
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- TABLA --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Listado de Sancionados
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>No. expediente</th>
                                <th>Nombre completo</th>
                                <th>Ente público</th>
                                <th class="text-center">Falta cometida</th>
                                <th>Tipo sanción</th>
                                <th>Tipo sancionado</th>
                                <th class="d-none">Año</th>
                                <th class="d-none">Mes</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- Registros 2026 --}}
                            <tr class="fs-6">
                                <td><small>1</small></td>
                                <td><small><a href="#" class="text-decoration-none fw-bold text-primary">SP-01/2026</a></small></td>
                                <td><small>ARMANDO PADILLA SANCHEZ</small></td>
                                <td><small>SABGOB</small></td>
                                <td class="text-center"><span class="badge bg-danger"><small>PECULADO</small></span></td>
                                <td><small>INHABILITACIÓN</small></td>
                                <td><small>PERSONA FÍSICA</small></td>
                                <td class="d-none"><small>2026</small></td>
                                <td class="d-none"><small>ENERO</small></td>
                            </tr>
                            <tr class="fs-6">
                                <td><small>2</small></td>
                                <td><small><a href="#" class="text-decoration-none fw-bold text-primary">SP-05/2026</a></small></td>
                                <td><small>MARIA ELENA LOPEZ</small></td>
                                <td><small>MUNICIPIO</small></td>
                                <td class="text-center"><span class="badge bg-danger"><small>PECULADO</small></span></td>
                                <td><small>INHABILITACIÓN</small></td>
                                <td><small>PERSONA FÍSICA</small></td>
                                <td class="d-none"><small>2026</small></td>
                                <td class="d-none"><small>ENERO</small></td>
                            </tr>
                            {{-- Registros 2025 --}}
                            <tr class="fs-6">
                                <td><small>3</small></td>
                                <td><small><a href="#" class="text-decoration-none fw-bold text-primary">SP-02/2025</a></small></td>
                                <td><small>JAVIER ARTURO RANGEL</small></td>
                                <td><small>SABGOB</small></td>
                                <td class="text-center"><span class="badge bg-danger"><small>COHECHO</small></span></td>
                                <td><small>ECONÓMICA</small></td>
                                <td><small>PERSONA FÍSICA</small></td>
                                <td class="d-none"><small>2025</small></td>
                                <td class="d-none"><small>FEBRERO</small></td>
                            </tr>
                            <tr class="fs-6">
                                <td><small>4</small></td>
                                <td><small><a href="#" class="text-decoration-none fw-bold text-primary">SP-03/2025</a></small></td>
                                <td><small>ARIEL ALEJANDRO RIVERO</small></td>
                                <td><small>SABGOB</small></td>
                                <td class="text-center"><span class="badge bg-danger"><small>PECULADO</small></span></td>
                                <td><small>INHABILITACIÓN</small></td>
                                <td><small>PERSONA FÍSICA</small></td>
                                <td class="d-none"><small>2025</small></td>
                                <td class="d-none"><small>MARZO</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('js')
@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnBuscar = document.getElementById('btnBuscar');
        const btnLimpiar = document.getElementById('btnLimpiar');
        const filtroEjercicio = document.getElementById('filtroEjercicio');
        const filtroPeriodo = document.getElementById('filtroPeriodo');
        const inputBusqueda = document.getElementById('inputBusquedaReal');
        const filas = document.querySelectorAll('#table1 tbody tr');

        function filtrar() {
            const valEjercicio = filtroEjercicio.value;
            const valPeriodo = filtroPeriodo.value;
            const valBusqueda = inputBusqueda.value.toLowerCase().trim();

            filas.forEach(fila => {
                const textoExpediente = fila.cells[1].textContent.toLowerCase();
                const textoNombre = fila.cells[2].textContent.toLowerCase();
                const textoAnio = fila.cells[7].textContent.trim();
                const textoMes = fila.cells[8].textContent.trim();

                const coincideAnio = valEjercicio === "" || textoAnio === valEjercicio;
                const coincideMes = valPeriodo === "" || textoMes === valPeriodo;
                const coincideBusqueda = valBusqueda === "" || 
                                        textoExpediente.includes(valBusqueda) || 
                                        textoNombre.includes(valBusqueda);

                if (coincideAnio && coincideMes && coincideBusqueda) {
                    fila.style.display = "";
                } else {
                    fila.style.display = "none";
                }
            });
        }

        btnBuscar.addEventListener('click', filtrar);

        btnLimpiar.addEventListener('click', function() {
            filtroEjercicio.value = "";
            filtroPeriodo.value = "";
            inputBusqueda.value = "";
            // Mostramos todas las filas
            filas.forEach(fila => fila.style.display = "");
        });

        filtrar();
    });
</script>
@endsection