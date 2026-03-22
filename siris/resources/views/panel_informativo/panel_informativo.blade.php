@extends('layouts.master')

@section('title', 'Panel Informativo')

@section('styles')
    @vite([
        'resources/src/assets/scss/iconly.scss',
        'resources/dist/assets/extensions/apexcharts/apexcharts.css'
    ])
    <style>
        :root {
            --bs-vino-soft: #630d16;
            --bs-azul-soft: #435ebe;
            --bs-morado-soft: #6d5dfc;
            --bs-naranja-soft: #ff9f43;
        }

        .card { border-radius: 15px !important; border: none !important; transition: transform 0.2s ease; }
        .card:hover { transform: translateY(-5px); }
        
        /*Bordes de los card*/
        .border-bottom-vino { border-bottom: 4px solid var(--bs-vino-soft) !important; }
        .border-bottom-azul { border-bottom: 4px solid #435ebe !important; }
        .border-bottom-morado { border-bottom: 4px solid var(--bs-morado-soft) !important; }

        /* El fondo de los iconos */
        .stats-icon.vino { background: rgba(99, 13, 22, 0.15); }
        .stats-icon.vino i { color: var(--bs-vino-soft) !important; }

        .stats-icon.azul-reporte { background: rgba(67, 94, 190, 0.15); }
        .stats-icon.azul-reporte i { color: #435ebe !important; }

        .stats-icon.morado-omiso { background: rgba(109, 93, 252, 0.15); }
        .stats-icon.morado-omiso i { color: var(--bs-morado-soft) !important; }

        /* Color de fondo del encabezado del periodo */
        .header-periodo { 
            background: linear-gradient(90deg, #ffffff 0%, #f0f3f5 100%);
            padding: 20px; 
            border-radius: 12px; 
            border-left: 5px solid #435ebe;
        }
    </style>
@endsection

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-gray-800">Panel Informativo</h3>
    </div>

    <div class="header-periodo shadow-sm mb-4">
        <h5 class="mb-0" style="color: #4b4b4b;">
            <i class="bi bi-calendar3 me-2"></i>
            Periodo del informe vigente: <span class="fw-bold text-dark">01 al 15 de enero 2026</span>
        </h5>
    </div>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            {{-- Tarjetas --}}
            <div class="row">
                @php
                    $stats = [
                        ['color' => 'vino', 'border' => 'border-bottom-vino', 'icon' => 'iconly-boldProfile', 'label' => 'Entes Públicos Proveedores', 'value' => '24', 'modal' => false],
                        ['color' => 'azul-reporte', 'border' => 'border-bottom-azul', 'icon' => 'iconly-boldTick-Square', 'label' => 'Reportaron en Tiempo', 'value' => '24', 'modal' => true],
                        ['color' => 'morado-omiso', 'border' => 'border-bottom-morado', 'icon' => 'iconly-boldInfo-Square', 'label' => 'Entes Públicos Omisos', 'value' => '0', 'modal' => false],
                    ];
                @endphp

                @foreach($stats as $stat)
                <div class="col-12 col-md-4">
                    <div class="card {{ $stat['border'] }} shadow-sm mb-4" @if($stat['modal']) style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalEntes" @endif>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon {{ $stat['color'] }} me-3">
                                    <i class="{{ $stat['icon'] }} fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted font-semibold mb-1" style="font-size: 0.9rem;">{{ $stat['label'] }}</h6>
                                    <h4 class="font-extrabold mb-0">{{ $stat['value'] }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Gráficos --}}
            <div class="row justify-content-center mt-2">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card border-bottom-azul shadow-sm">
                        <div class="card-header bg-transparent border-0 text-center pt-4">
                            <h4 class="card-title fw-bold">Avance de Cumplimiento</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-avance"></div>
                            <div class="text-center">
                                <span class="badge bg-primary px-4 py-3 fs-5 shadow-sm" style="border-radius: 8px;">100 % Completado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modal --}}
<div class="modal fade" id="modalEntes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0" style="border-radius: 15px;">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <div class="text-center mb-4">
                    <h5 class="fw-bold mb-1">Estatus de Informes Quincenales</h5>
                    <p class="text-muted small">Listado detallado de entes públicos</p>
                </div>
                <div class="table-responsive rounded-3 overflow-hidden">
                    <table class="table table-hover">
                        <thead style="background: white; color: #333;">
                            <tr>
                                <th class="py-3 ps-3">No.</th>
                                <th class="py-3">Ente Público</th>
                                <th class="py-3">Fecha de Envío</th>
                                <th class="py-3">Estatus</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td class="ps-3">1</td>
                                <td class="fw-bold text-dark">SABGOB</td>
                                <td>16 Ene 2026</td>
                                <td><span class="badge bg-light-success text-success px-3">Normal</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3">24</td> <td class="fw-bold text-dark">SEDE</td>
                                <td>22 Ene 2026</td>
                                <td><span class="badge bg-light-warning text-warning px-3">Extemporáneo</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @vite(['resources/dist/assets/extensions/apexcharts/apexcharts.min.js'])
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [100],
                chart: { 
                    height: 350, 
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        hollow: { size: '72%', background: 'transparent' },
                        track: { background: '#f2f2f2', strokeWidth: '97%' },
                        dataLabels: {
                            name: { show: false },
                            value: {
                                offsetY: 15,
                                fontSize: '42px',
                                fontWeight: '800',
                                color: '#333',
                                formatter: function (val) { return val + "%"; }
                            }
                        }
                    }
                },
                fill: {
                    type: 'solid',
                    colors: ['#435ebe']
                },
                stroke: { lineCap: 'round' },
                labels: ['Cumplimiento'],
            };

            var chart = new ApexCharts(document.querySelector("#chart-avance"), options);
            chart.render();
        });
    </script>
@endsection