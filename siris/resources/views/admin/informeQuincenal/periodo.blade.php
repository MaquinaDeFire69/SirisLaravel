@extends('layouts.master')

@section('title', 'Dashboard')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <!-- Definir titulo y ruta-->
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>Entes públicos proveedores de información</h3>
                    <p class="text-subtitle text-muted">El presente apartado visualiza la información del estatus de cumplimiento de un ente público en un periodo de entrega</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Informe quincenal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Periodos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="page-content">
            <!-- Fin titulo y ruta-->

            <!-- Basic choices start -->
            <section class="basic-choices">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title">Choices</h4>
                            </div> -->
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>* Seleccione un periodo del informe</h6>
                                            <div class="form-group">
                                                <select class="form-select text-dark fw-bold">
                                                    @foreach($periodos as $periodo)
                                                        <option>{{ $periodo }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic choices end -->

            {{-- ===== STATS CARDS ===== --}}
            <div class="row justify-content-center">
                @foreach($stats as $stat)
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon {{ $stat['color'] }} mb-2">
                                            <i class="{{ $stat['icon'] }}"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">{{ $stat['label'] }}</h6>
                                        <h6 class="font-extrabold mb-0">{{ $stat['value'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Minimal jQuery Datatable end -->
            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Listado de entes públicos
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
                            <table class="table" id="table2">
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
                                                <a href="#" class="btn btn-primary rounded-pill">Descargar acuse</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Exportar a PDF la información del Periodo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->
        </div>
    </div>
@endsection
