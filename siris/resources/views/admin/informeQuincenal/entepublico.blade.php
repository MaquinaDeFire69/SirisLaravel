@extends('layouts.admin.master')

@section('title', 'Dashboard')

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
            <h3>Entes públicos proveedores de información</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información del estatus de cumplimiento de un ente público proveedor de información
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('panel-informativo') }}">Informe quincenal</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Entes públicos</li>
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
                        <select class="form-select text-dark fw-bold" name="anio">
                            <option value="">Seleccionar año</option>
                            @foreach($anios as $anio)
                                <option value="{{ $anio }}">{{ $anio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <h6>Mes</h6>
                        <select class="form-select text-dark fw-bold" name="mes">
                            <option value="">Seleccionar mes</option>
                            @foreach($meses as $key => $mes)
                                <option value="{{ $key }}">{{ $mes }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6>* Ente público proveedor de información</h6>
                        <select class="form-select text-dark fw-bold" name="proveedor">
                            <option value="">Seleccionar ente público</option>
                            @foreach($proveedores as $prov)
                                <option value="{{ $prov['id'] }}">
                                    {{ $prov['nombre'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6 mb-2">
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-check-circle me-2"></i>
                            Generar informe quincenal
                        </button>
                   
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-eraser me-2"></i>
                            Limpiar filtros de búsqueda
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CARDS --}}
    <section class="section">
        <div class="row mt-4">
            @foreach($cards as $card)
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-{{ $card['color'] }} border-4">
                    <div class="card-body text-center">
                        <p class="card-text fw-bold text-dark mb-2 small">{{ $card['label'] }}</p>
                        <h1 class="display-3 fw-bold text-{{ $card['color'] }}">
                            {{ $card['valor'] }}
                        </h1>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- TABLA --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Listado de informes quincenales reportados en el periodo
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>Periodo del informe</th>
                                <th>Registros reportados</th>
                                <th>Fecha envío reporte</th>
                                <th>Estatus</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($informes as $index => $inf)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $inf['periodo'] }}</td>
                                <td>{{ $inf['registros'] }}</td>
                                <td>{{ $inf['fecha'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $inf['estatus'] == 'Normal' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $inf['estatus'] }}
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-download"></i> Descargar acuse
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-pdf"></i>
                        Exportar a PDF la información del Periodo
                    </a>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection

@section('js')
@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])

@endsection