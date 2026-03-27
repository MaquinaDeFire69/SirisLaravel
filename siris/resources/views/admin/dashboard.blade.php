@extends('layouts.master')

@section('title', 'Panel Informativo')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
    <style>
        .btn-card { transition: transform 0.2s; cursor: pointer; }
        .btn-card:hover { transform: translateY(-5px); }
        /* Ajuste para que el gráfico no sea demasiado grande en la card */
        #avanceChart { min-height: 150px !important; }
    </style>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Resumen de Cumplimiento</h3>
                <p class="text-subtitle text-muted">Periodo del informe vigente: <strong>01 al 15 de enero 2026</strong></p>
            </div>
        </div>
    </div>

    <section class="section">
        {{-- Row de Cards Informativas usando el modelo del primer archivo --}}
        <div class="row">
            @php
                $dashboardStats = [
                    [
                        'color' => 'red', 
                        'icon' => 'iconly-boldProfile', 
                        'label' => 'Proveedores de información', 
                        'value' => '24',
                        'modal' => false
                    ],
                    [
                        'color' => 'info', 
                        'icon' => 'iconly-boldTick-Square', 
                        'label' => 'Reportaron en tiempo', 
                        'value' => '24',
                        'modal' => true,
                        'target' => 'modalEntes',
                        'titulo' => 'Entes que reportaron en tiempo'
                    ],
                    [
                        'color' => 'primary', 
                        'icon' => 'iconly-boldDanger', 
                        'label' => 'Entes públicos omisos', 
                        'value' => '0',
                        'modal' => false
                    ],
                ];
            @endphp

            @foreach($dashboardStats as $stat)
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card btn-card" 
                    @if($stat['modal']) 
                        data-bs-toggle="modal" 
                        data-bs-target="#{{ $stat['target'] }}"
                        data-titulo="{{ $stat['titulo'] }}"
                        data-cantidad="{{ $stat['value'] }}"
                        data-color="bg-{{ $stat['color'] }}"
                    @endif>
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

        {{-- Row para el gráfico de avance --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="text-muted font-semibold mb-3">Avance de cumplimiento</h6>
                        <div id="avanceChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modal Dinámico --}}
<div class="modal fade" id="modalEntes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header shadow-sm text-white" id="modalHeader">
                <h5 class="modal-title text-white">Estatus de Informes</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <h5 class="fw-bold text-dark" id="modalDinamicoTitulo">Cargando...</h5>
                    <span class="badge fs-5" id="modalDinamicoCantidad">0</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Ente público</th>
                                <th>Fecha envío</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td><td>SABGOB</td><td>2026-01-16</td>
                                <td><span class="badge bg-success">Normal</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. ApexCharts
        var options = {
            series: [100],
            chart: { type: 'radialBar', height: 300, sparklines: { enabled: true } },
            plotOptions: {
                radialBar: {
                    startAngle: -90,
                    endAngle: 90,
                    track: { background: "#e7e7e7", strokeWidth: '97%' },
                    dataLabels: {
                        name: { show: false },
                        value: { offsetY: -20, fontSize: '22px', fontWeight: 'bold' }
                    }
                }
            },
            fill: { colors: ["#ffc107"] },
            labels: ['Cumplimiento'],
        };
        new ApexCharts(document.querySelector("#avanceChart"), options).render();

        // 2. Lógica del Modal
        const modalEntes = document.getElementById('modalEntes');
        modalEntes.addEventListener('show.bs.modal', function (event) {
            const card = event.relatedTarget;
            const titulo = card.getAttribute('data-titulo');
            const cantidad = card.getAttribute('data-cantidad');
            const colorClase = card.getAttribute('data-color');

            document.getElementById('modalDinamicoTitulo').textContent = titulo;
            document.getElementById('modalDinamicoCantidad').textContent = cantidad;
            document.getElementById('modalHeader').className = 'modal-header shadow-sm ' + colorClase;
            document.getElementById('modalDinamicoCantidad').className = 'badge fs-5 ' + colorClase;
        });
    });
</script>
@endsection