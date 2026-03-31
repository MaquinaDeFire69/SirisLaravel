@extends('layouts.enlace.master')

@section('title', 'Consultar Informes')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-heading">

    {{-- HEADER Y TÍTULO --}}
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="fw-bold" style="color: #1a1a1a;">Consultar informes</h2>
        </div>
    </div>

   {{-- FILTROS DE BÚSQUEDA --}}
    <form method="GET" action="{{ url()->current() }}" class="row mb-4 justify-content-center align-items-end">
        
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">EJERCICIO</label>
                <select name="ejercicio" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="2026" {{ request('ejercicio') == '2026' ? 'selected' : '' }}>2026</option>
                    <option value="2025" {{ request('ejercicio') == '2025' ? 'selected' : '' }}>2025</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">PERIODO INFORMADO</label>
                <select name="periodo" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="ENERO" {{ request('periodo') == 'ENERO' ? 'selected' : '' }}>ENERO</option>
                    <option value="FEBRERO" {{ request('periodo') == 'FEBRERO' ? 'selected' : '' }}>FEBRERO</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-danger text-white px-4" style="background-color: #a52a2a; border-color: #a52a2a;">
                Buscar
            </button>
        </div>

    </form>

    {{-- CONTENEDOR DE LA TABLA --}}
    <div class="card shadow-sm border-0">
        
        {{-- CABECERA DE LA TABLA (Título y Buscador) --}}
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h6 class="mb-0 fw-bold text-dark">Listado de informes quincenales</h6>
            <div style="width: 250px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Search">
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle mb-0">
                    
                    {{-- ENCABEZADO AZUL --}}
                    <thead class="text-white">
                        <tr>
                            <th class="py-3">No. reporte <i class="bi bi-filter"></i></th>
                            <th class="py-3">Periodo informe</th>
                            <th class="py-3">Fecha de envío</th>
                            <th class="py-3">Estatus</th>
                            <th class="py-3">Accion</th>
                        </tr>
                    </thead>

                    {{-- CUERPO DE LA TABLA (DINÁMICO) --}}
                    <tbody>
                        @foreach($informes as $informe)
                        <tr>
                            <td class="text-muted">{{ $informe['no'] }}</td>
                            <td>{{ $informe['periodo'] }}</td>
                            <td>{{ $informe['fecha'] }}</td>
                            <td>
                                @if($informe['estatus'] == 'Normal')
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 border border-primary border-opacity-25 rounded-1">Normal</span>
                                @else
                                    <span class="badge bg-danger text-white px-3 py-2 rounded-1">Extemporaneo</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm {{ $informe['estatus'] == 'Normal' ? 'btn-primary' : 'btn-secondary' }} rounded-1" {{ $informe['estatus'] == 'Extemporaneo' ? 'disabled' : '' }}>
                                    Descargar acuse
                                </button>
                            </td>
                        </tr>
                        @endforeach

                        {{-- Filas vacías de relleno (simulando el diseño) --}}
                        @for ($i = 0; $i < 4; $i++)
                        <tr>
                            <td class="text-muted">***</td>
                            <td class="text-muted">***</td>
                            <td class="text-muted">***</td>
                            <td><span class="badge bg-light text-muted px-3 py-2">***</span></td>
                            <td></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PIE DE TABLA: PAGINACIÓN --}}
        <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 border-top">
            <div>
                <span class="text-muted small me-2">Items per page</span>
                <select class="form-select form-select-sm d-inline-block w-auto text-muted">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            
            <div class="d-flex align-items-center">
                <span class="text-muted small me-3">1 - 10 of 209</span>
                <button class="btn btn-sm btn-light text-muted me-1 border"><i class="bi bi-chevron-left"></i></button>
                <button class="btn btn-sm btn-light text-muted border"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>

    </div>

</div>
@endsection