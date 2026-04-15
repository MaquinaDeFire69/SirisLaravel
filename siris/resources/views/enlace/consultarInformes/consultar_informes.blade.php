@extends('layouts.enlace.master')

@section('title', 'Consultar Informes')

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
            <h3>Consultar informes</h3>
            <p class="text-subtitle text-muted">
                El presente apartado muestra el historial de reportes quincenales oficiales.
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Consultar informes</a></li>
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
                <h5 class="card-title mb-4">Filtros de búsqueda</h5>
                
                <form method="GET" action="{{ url()->current() }}">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Año</h6>
                            <select name="ejercicio" class="form-select text-dark fw-bold">
                                <option value="">Todos</option>
                                <option value="2026" {{ request('ejercicio') == '2026' ? 'selected' : '' }}>2026</option>
                                <option value="2025" {{ request('ejercicio') == '2025' ? 'selected' : '' }}>2025</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <h6>Mes</h6>
                            <select name="periodo" class="form-select text-dark fw-bold">
                                <option value="">Seleccionar...</option>
                                <option value="ENERO" {{ request('periodo') == 'ENERO' ? 'selected' : '' }}>Enero</option>
                                <option value="FEBRERO" {{ request('periodo') == 'FEBRERO' ? 'selected' : '' }}>Febrero</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-6 mb-2 text-center">
                            <button type="submit" class="btn btn-primary btn-sm me-2">
                                <i class="bi bi-search me-2"></i>
                                Buscar
                            </button>
                        
                            <a href="{{ url()->current() }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>
                                Limpiar filtros
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    {{-- TABLA --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Listado de informes quincenales
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No. reporte</th>
                                <th>Periodo informe</th>
                                <th>Fecha de envío</th>
                                <th>Estatus</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($informes as $informe)
                            <tr class="fs-6">
                                <td><small>{{ $informe['no'] }}</small></td>
                                <td><small>{{ $informe['periodo'] }}</small></td>
                                <td><small>{{ $informe['fecha'] }}</small></td>
                                <td>
                                    @if($informe['estatus'] == 'Normal')
                                        <span class="badge bg-success">
                                            <small>NORMAL</small>
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <small>EXTEMPORÁNEO</small>
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm" {{ $informe['estatus'] == 'Extemporaneo' ? 'disabled' : '' }}>
                                        <small><i class="bi bi-download"></i> Acuse</small>
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

@endsection

@section('js')
@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])
@endsection