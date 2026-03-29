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

    <section class="section">
        {{-- Row de Cards Informativas usando el modelo del primer archivo --}}
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-danger border-4 btn-card">
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
                     data-bs-target="#modalEntes"
                     data-titulo="Entes que reportaron en tiempo"
                     data-cantidad="24"
                     data-color="bg-info">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <p class="card-text text-dark mb-2 small">Entes públicos que<br>reportaron en tiempo</p>
                        <h1 class="display-3 fw-bold text-info mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4 btn-card">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <p class="card-text text-dark mb-2 small">Entes públicos omisos</p>
                        <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
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

    <div class="modal fade" id="modalEntes" tabindex="-1" aria-labelledby="modalEntesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header shadow-sm transition-color" id="modalHeader">
                    <h5 class="modal-title text-white" id="modalEntesLabel">Estatus de su informe quincenal</h5>
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
                                    <th>Fecha envío reporte</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody id="tablaCuerpo">
                                <tr>
                                    <td>1</td><td>SABGOB</td><td>2026-01-16</td>
                                    <td><span class="badge bg-success">Normal</span></td>
                                </tr>
                                <tr>
                                    <td>24</td><td>SEDE</td><td>2026-01-22</td>
                                    <td><span class="badge bg-warning text-dark">Extemporáneo</span></td>
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