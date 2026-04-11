@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Entes públicos proveedores de información</h3>
                    <p class="text-subtitle text-muted">El presente apartado visualiza la información del estatus de cumplimiento de un ente público en un periodo de entrega</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Informe quincenal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Periodos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="page-content">
            <section class="basic-choices">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>* Seleccione un periodo del informe</h6>
                                            <div class="form-group">
                                                <form method="GET" action="{{ route('informe.periodo') }}">
                                                    <select name="periodo" class="form-select text-dark fw-bold" onchange="this.form.submit()">
                                                        @foreach($periodos as $periodo)
                                                            <option value="{{ $periodo }}" {{ $periodo == $periodoSeleccionado ? 'selected' : '' }}>
                                                                {{ $periodo }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- ===== STATS CARDS ===== --}}
            <div class="row justify-content-center">
                @foreach($stats as $stat)
                    @php
                        $colors = [
                            ['border' => '#dc3545', 'text' => '#dc3545'], // rojo
                            ['border' => '#0dcaf0', 'text' => '#0dcaf0'], // azul
                            ['border' => '#6f42c1', 'text' => '#6f42c1'], // morado
                        ];

                        $color = $colors[$loop->index] ?? ['border' => '#6c757d', 'text' => '#6c757d'];
                    @endphp

                    <div class="col-12 col-md-4 mb-4">
                        <div class="card shadow-sm h-100 border-start border-4"
                            style="border-left-color: {{ $color['border'] }} !important;">
                            <div class="card-body text-center d-flex flex-column justify-content-center">
                                <p class="card-text fw-bold text-dark mb-2 small">
                                    {{ $stat['label'] }}
                                </p>
                                <h1 class="display-3 fw-bold"
                                    style="color: {{ $color['text'] }};">
                                    {{ $stat['value'] }}
                                </h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center mb-3">
                            Listado de entes públicos
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
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

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ente público</th>
                                        <th>Registros reportados</th>
                                        <th>Fecha envió reporte</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($entes as $index => $ente)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $ente['nombre'] }}</td>
                                            <td>{{ $ente['registros'] }}</td>
                                            <td>{{ $ente['fecha'] }}</td>
                                            <td>
                                                <span class="badge {{ $ente['estatus'] == 'Normal' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $ente['estatus'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary">
                                                    <i class="bi bi-download"></i> Descargar acuse
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Exportar a PDF la información del Periodo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
    </div>
@endsection
