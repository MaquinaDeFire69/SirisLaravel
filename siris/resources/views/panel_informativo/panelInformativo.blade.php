<x-app-layout>
    <div class="page-heading mb-4">
        <h3>Panel Informativo</h3>
    </div>

    <div class="page-content">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm text-center">
                    <div class="card-body py-3">
                        <h5 class="card-title text-muted mb-0">
                            <strong>Periodo del informe vigente:</strong> 01 al 15 de enero 2026
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-danger border-4">
                    <div class="card-body text-center d-flex flex-col justify-content-between">
                        <p class="card-text text-muted mb-2 small">Entes públicos<br>Proveedores de información</p>
                        <h1 class="display-3 fw-bold text-danger mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-info border-4">
                    <div class="card-body text-center d-flex flex-col justify-content-between">
                        <p class="card-text text-muted mb-2 small">Entes públicos que<br>reportaron en tiempo</p>
                        <h1 class="display-3 fw-bold text-info mb-0">24</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-start border-primary border-4">
                    <div class="card-body text-center d-flex flex-col justify-content-between">
                        <p class="card-text text-muted mb-2 small">Entes públicos omisos</p>
                        <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 border-start border-warning border-4">
                    <div class="card-body text-center d-flex flex-col justify-content-between">
                        <p class="card-text text-muted mb-2 fs-5">Avance de cumplimiento</p>
                        <h1 class="display-1 fw-bold text-warning mb-0">100 %</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <button type="button" class="btn btn-outline-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalEntes">
    Ver listado
    </button>
</x-app-layout>



<div class="modal fade" id="modalEntes" tabindex="-1" aria-labelledby="modalEntesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="modalEntesLabel">
                    Estatus de su informe quincenal
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <h5 class="fw-bold">Listado de entes públicos proveedores de información con</h5>
                    <span class="badge bg-info fs-5">24</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Ente público</th>
                                <th>Fecha envió reporte</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SABGOB</td>
                                <td>2026-16-01</td>
                                <td><span class="badge bg-success">Normal</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SESAEQROO</td>
                                <td>2026-18-01</td>
                                <td><span class="badge bg-success">Normal</span></td>
                            </tr>
                            <tr>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>SEDE</td>
                                <td>2026-22-01</td>
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