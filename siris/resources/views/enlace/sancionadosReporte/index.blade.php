@extends('layouts.enlace.master')

@section('title', 'Listado de Sancionados')

@section('styles')
@vite(['resources/src/assets/scss/iconly.scss'])
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h3 class="text-gray-800 m-0">Sancionados reporte</h3>
        <p class="text-muted small m-0">El presente apartado muestra registros oficiales de sanciones correspondientes al periodo seleccionado.</p>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item text-muted">Sancionados</li>
            <li class="breadcrumb-item active" aria-current="page">Reporte</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm" style="border-radius: 10px;">
    <div class="card-body">
        <h5 class="text-center mb-4 fw-bold text-dark">Listado de Sancionados</h5>

        {{-- Filtros Superiores --}}
        <div class="row mb-4 justify-content-center text-center">
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <span class="me-2 filtro-label">Año</span>
                <select class="form-select filtro-select" id="filtroEjercicio">
                    <option value="">Todos</option>
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <span class="me-2 filtro-label">Mes</span>
                <select class="form-select filtro-select" id="filtroPeriodo" style="width: 160px;">
                    <option value="">Seleccionar...</option>
                    <option value="ENERO">Enero</option>
                    <option value="FEBRERO">Febrero</option>
                    <option value="MARZO">Marzo</option>
                </select>
                
                <button id="btnBuscar" class="btn ms-3 text-white fw-bold shadow-sm" style="background-color: #a54844; border-radius: 8px;">Buscar</button>
                
                <button id="btnLimpiar" class="btn ms-2 btn-light fw-bold shadow-sm border" title="Borrar filtros" style="border-radius: 8px;">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </button>
            </div>
        </div>

        <hr class="opacity-25">

        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex align-items-center">
                <span class="me-2 small fw-bold text-dark">Buscar:</span>
                <input type="text" id="inputBusquedaReal" class="form-control form-control-sm shadow-sm" placeholder="Nombre o expediente..." style="width: 250px; border-radius: 7px;">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="tablaSancionados" style="font-size: 0.9rem; color: #333; width: 100%;">
                <thead style="background-color: #f8fafc; border-bottom: 2px solid #dee2e6;">
                    <tr class="text-dark">
                        <th>No.</th>
                        <th>No. expediente</th>
                        <th>Nombre completo</th>
                        <th>Ente público</th>
                        <th class="text-center">Falta cometida</th>
                        <th>Tipo sanciones</th>
                        <th>Tipo sancionado</th>
                        <th class="d-none">Año</th>
                        <th class="d-none">Mes</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Registros 2026 --}}
                    <tr>
                        <td>1</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>ARMANDO PADILLA SANCHEZ</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2026</td>
                        <td class="d-none">ENERO</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-05/2026</a></td>
                        <td>MARIA ELENA LOPEZ</td>
                        <td>MUNICIPIO</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2026</td>
                        <td class="d-none">ENERO</td>
                    </tr>
                    {{-- Registros 2025 --}}
                    <tr>
                        <td>3</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2025</a></td>
                        <td>JAVIER ARTURO RANGEL</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">COHECHO</span></td>
                        <td>ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2025</td>
                        <td class="d-none">FEBRERO</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-03/2025</a></td>
                        <td>ARIEL ALEJANDRO RIVERO</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
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
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@endsection