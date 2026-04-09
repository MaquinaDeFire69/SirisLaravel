@extends('layouts.admin.master')

@section('title', 'Panel Informativo')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>Panel informativo</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Periodo informativo/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>
    
    <div class="page-content">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm text-center border-0" style="border-radius: 15px;">
                    <div class="card-body py-3">
                        <h5 class="card-title text-dark mb-0">
                            <strong>Periodo del informe vigente:</strong> 01 al 15 de enero 2026
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-danger border-4">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <p class="card-text fw-bold text-dark mb-2 small">Entes públicos<br>Proveedores de información</p>
                        <h1 class="display-3 fw-bold text-danger mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-info border-4">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <p class="card-text fw-bold text-dark mb-2 small">Entes públicos que<br>reportaron en tiempo</p>
                        <h1 class="display-3 fw-bold text-info mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4">
                    <div class="card-body text-center d-flex flex-column justify-content-center">
                        <p class="card-text fw-bold text-dark mb-2 small">Entes públicos omisos</p>
                        <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow-lg h-100 border-top border-warning border-4 btn-card" 
                     style="cursor: pointer" 
                     onclick="abrirDetalleAvance()">
                    <div class="card-body text-center p-3">
                        <p class="card-text text-dark mb-0 fw-bold">Avance de cumplimiento</p>
                        <div id="avanceChart" style="min-height: 200px;"></div>
                        <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Ver detalle de cumplimiento</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetalleAvance" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header border-0 bg-light">
                    <h5 class="modal-title fw-bold text-dark w-100 text-center">Detalle de Cumplimiento General</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Ente Público</th>
                                    <th>Fecha de Envío</th>
                                    <th class="text-center">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>SABGOB</td>
                                    <td>2026-01-14</td>
                                    <td class="text-center"><span class="badge bg-success">Cumplido</span></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Configuración del Chart
            var options = {
                series: [100],
                chart: {
                    type: 'radialBar',
                    height: 300,
                    sparkline: { enabled: true }
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        track: {
                            background: "#e7e7e7",
                            strokeWidth: '97%',
                        },
                        dataLabels: {
                            name: { show: false },
                            value: {
                                offsetY: -20,
                                fontSize: '30px',
                                fontWeight: 'bold',
                                formatter: function (val) { return val + "%"; }
                            }
                        }
                    }
                },
                fill: { colors: ["#ffc107"] },
                labels: ['Cumplimiento'],
            };

            var chart = new ApexCharts(document.querySelector("#avanceChart"), options);
            chart.render();
        });

        // Función para abrir el modal manualmente
        function abrirDetalleAvance() {
            var myModal = new bootstrap.Modal(document.getElementById('modalDetalleAvance'));
            myModal.show();
        }
    </script>

    <style>
        .btn-card { transition: all 0.3s ease; }
        .btn-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; 
        }
    </style>
@endsection