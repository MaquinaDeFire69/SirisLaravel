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
            <h3>Sancionados reporte</h3>
            <p class="text-subtitle text-muted">
                El presente apartado muestra registros oficiales de sanciones correspondientes al periodo seleccionado.
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Sancionados</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte</li>
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
                        <button id="btnBuscar" class="btn btn-outline-primary me-2">
                            <i class="bi bi-search me-2"></i>
                            Buscar
                        </button>
                    
                        <button id="btnLimpiar" class="btn btn-outline-primary">
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
                            <tr>
                                <td>1</td>
                                <td><a href="#" class="text-decoration-none fw-bold text-primary">SP-01/2026</a></td>
                                <td>ARMANDO PADILLA SANCHEZ</td>
                                <td>SABGOB</td>
                                <td class="text-center"><span class="badge bg-danger">PECULADO</span></td>
                                <td>INHABILITACIÓN</td>
                                <td>PERSONA FÍSICA</td>
                                <td class="d-none">2026</td>
                                <td class="d-none">ENERO</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="#" class="text-decoration-none fw-bold text-primary">SP-05/2026</a></td>
                                <td>MARIA ELENA LOPEZ</td>
                                <td>MUNICIPIO</td>
                                <td class="text-center"><span class="badge bg-danger">PECULADO</span></td>
                                <td>INHABILITACIÓN</td>
                                <td>PERSONA FÍSICA</td>
                                <td class="d-none">2026</td>
                                <td class="d-none">ENERO</td>
                            </tr>
                            {{-- Registros 2025 --}}
                            <tr>
                                <td>3</td>
                                <td><a href="#" class="text-decoration-none fw-bold text-primary">SP-02/2025</a></td>
                                <td>JAVIER ARTURO RANGEL</td>
                                <td>SABGOB</td>
                                <td class="text-center"><span class="badge bg-danger">COHECHO</span></td>
                                <td>ECONÓMICA</td>
                                <td>PERSONA FÍSICA</td>
                                <td class="d-none">2025</td>
                                <td class="d-none">FEBRERO</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><a href="#" class="text-decoration-none fw-bold text-primary">SP-03/2025</a></td>
                                <td>ARIEL ALEJANDRO RIVERO</td>
                                <td>SABGOB</td>
                                <td class="text-center"><span class="badge bg-danger">PECULADO</span></td>
                                <td>INHABILITACIÓN</td>
                                <td>PERSONA FÍSICA</td>
                                <td class="d-none">2025</td>
                                <td class="d-none">MARZO</td>
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
@endsection