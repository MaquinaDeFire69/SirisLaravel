@extends('layouts.enlace.master')

@section('title', 'Panel Informativo')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.css'
])
@endsection

@section('content')

{{-- Siempre debe estar presente --}}
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Panel informativo</h3>
            <p class="text-subtitle text-muted">
                Resumen del estado actual de los reportes.
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Panel informativo</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<br>

<div class="page-content">

    {{-- CARDS ESTADÍSTICAS --}}
    <section class="section">
        <div class="row mt-4">
            
            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow-sm h-100 border-start border-info border-4">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <p class="card-text fw-bold text-dark mb-2 small">Periodo en curso<br>Estatus: por entregar</p>
                        <h3 class="display-6 fw-bold text-info mb-0">16-28 Feb 2026</h3>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <p class="card-text fw-bold text-dark mb-2 small">Informes no reportados</p>
                        <h1 class="display-6 fw-bold text-primary mb-0">0</h1>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- HEADER PERIODO --}}
    <div class="text-center mb-4">
        <h5 class="mb-0 text-primary">
            <i class="bi bi-calendar3 me-2"></i>
            Fecha actual: <span class="fw-bold text-dark">16 al 28 de febrero 2026</span>
        </h5>
    </div>

    {{-- TABLA --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Reportes quincenales
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    {{-- El ID table1 asegurará que el template inicialice DataTables/jQuery automáticamente (Buscador y Paginación incluidos) --}}
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>Reporte</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <span class="fw-bold text-dark">Reporte de Sancionados Segunda Quincena de Febrero</span><br>
                                    <span class="text-muted">**********</span>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">Estado de cumplimiento</span><br>
                                    <span class="badge bg-secondary">Por entregar...</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold text-dark">Reporte de Sancionados Primera Quincena de Febrero</span><br>
                                    <span class="text-muted">**********</span>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">Estado de cumplimiento</span><br>
                                    <span class="badge bg-danger">Informe no reportado</span>
                                </td>
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
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
])
@endsection