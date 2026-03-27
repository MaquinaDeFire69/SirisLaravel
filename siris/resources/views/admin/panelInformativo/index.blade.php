@extends('layouts.master')

@section('title', 'Panel Informativo')

@section('content')
    <div class="page-title">
        <!-- Definir titulo y ruta-->
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>Panel informativo</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Periodo informativo/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <br>
        <div class="page-content">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm text-center">
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
                <div class="card shadow-sm h-100 border-start border-danger border-4 btn-card"
                style="cursor: pointer"
                     data-bs-toggle="modal"
                     data-bs-target="#EntesPublicos"
                     data-cantidad="24"
                     data-color="bg-success">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <p class="card-text text-dark mb-2 small">Entes públicos<br>Proveedores de información</p>
                        <h1 class="display-3 fw-bold text-danger mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-info border-4 btn-card"
                     style="cursor: pointer"
                     data-bs-toggle="modal"
                     data-bs-target="#EnTiempo"
                     data-cantidad="24"
                     data-color="bg-info">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <p class="card-text text-dark mb-2 small">Entes públicos que<br>reportaron en tiempo</p>
                        <h1 class="display-3 fw-bold text-info mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4 btn-card"
                 style="cursor: pointer"
                     data-bs-toggle="modal"
                     data-bs-target="#Omisos"
                     data-cantidad="24"
                     data-color="bg-danger"
                >
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <p class="card-text text-dark mb-2 small">Entes públicos omisos</p>
                        <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-lg-3 mb-4"> <div class="card shadow-sm h-100 border-top border-warning border-4">
                        <div class="card-body text-center p-2"> <p class="card-text text-dark mb-0 fw-bold" style="font-size: 0.9rem;">Avance de cumplimiento</p>
                            <div id="avanceChart" style="min-height: 200px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EntesPublicos" tabindex="-1" aria-labelledby="modalEntesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary w-100 text-center">Entes que reportaron en tiempo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Ente público</th>
                                </tr>
                            </thead>
                            <tbody id="tablaCuerpo">
                                <tr>
                                    <td>1</td><td>SABGOB</td>
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

    <div class="modal fade" id="EnTiempo" tabindex="-1" aria-labelledby="modalEntesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary w-100 text-center">Entes que reportaron en tiempo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Ente público</th>
                                    <th>Fecha envío reporte</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody id="tablaCuerpo">
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

    <div class="modal fade" id="Omisos" tabindex="-1" aria-labelledby="modalEntesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary w-100 text-center">Entes públicos omisos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Ente público</th>
                                    <th>Fecha envío reporte</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody id="tablaCuerpo">
                                <tr>
                                    <td>1</td><td>SABGOB</td><td>2026-01-16</td>
                                    <td><span class="badge bg-danger">Extratemporaneo</span></td>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // 1. Configuración del Chart SEMI-CÍRCULO (Media Luna)
                var options = {
                    series: [100], // Valor del avance
                    chart: {
                        type: 'radialBar',
                        height: 350,
                        offsetY: -20, // Sube un poco el chart para quitar espacio muerto
                        sparklines: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        radialBar: {
                            startAngle: -90, // Inicio de la media luna
                            endAngle: 90,    // Fin de la media luna
                            track: {
                                background: "#e7e7e7",
                                strokeWidth: '97%',
                                margin: 5, // margen del track
                            },
                            dataLabels: {
                                name: {
                                    show: true,
                                    color: '#888',
                                    fontSize: '16px',
                                    offsetY: -10
                                },
                                value: {
                                    offsetY: -50,
                                    fontSize: '30px',
                                    fontWeight: 'bold',
                                    color: '#111',
                                    formatter: function (val) {
                                        return val + "%";
                                    }
                                }
                            }
                        }
                    },
                    grid: {
                        padding: {
                            top: -10
                        }
                    },
                    fill: {
                        colors: ["#ffc107"] // Color warning (Amarillo)
                    },
                    labels: ['Cumplimiento'],
                };

                var chart = new ApexCharts(document.querySelector("#avanceChart"), options);
                chart.render();

                // 2. Lógica del Modal (Solo para la card de en medio)
                const modalEntes = document.getElementById('modalEntes');
                modalEntes.addEventListener('show.bs.modal', function (event) {
                    const card = event.relatedTarget;
                    const titulo = card.getAttribute('data-titulo');
                    const cantidad = card.getAttribute('data-cantidad');
                    const colorClase = card.getAttribute('data-color');

                    document.getElementById('modalDinamicoTitulo').textContent = 'Listado de ' + titulo;
                    document.getElementById('modalDinamicoCantidad').textContent = cantidad;
                    document.getElementById('modalHeader').className = 'modal-header shadow-sm ' + colorClase;
                    document.getElementById('modalDinamicoCantidad').className = 'badge fs-5 ' + colorClase;
                });
            });
        </script>
    <style>
        .btn-card { transition: transform 0.2s; }
        .btn-card:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; }
        .transition-color { transition: background-color 0.3s ease; }
    </style>
@endsection