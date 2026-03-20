@extends('layouts.master')

@section('content')
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
        {{-- Card: Entes Públicos --}}
        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-danger border-4">
                <div class="card-body text-center">
                    <p class="card-text text-muted mb-2 small">Entes públicos<br>Proveedores de información</p>
                    <h1 class="display-3 fw-bold text-danger mb-0">24</h1>
                </div>
            </div>
        </div>

        {{-- Card: Reportaron en tiempo --}}
        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-info border-4">
                <div class="card-body text-center">
                    <p class="card-text text-muted mb-2 small">Entes públicos que<br>reportaron en tiempo</p>
                    <h1 class="display-3 fw-bold text-info mb-0">24</h1>
                </div>
            </div>
        </div>

        {{-- Card: Omisos --}}
        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-primary border-4">
                <div class="card-body text-center">
                    <p class="card-text text-muted mb-2 small">Entes públicos omisos</p>
                    <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow h-100 border-start border-warning border-4">
                <div class="card-body text-center">
                    <p class="card-text text-muted mb-2 fs-5">Avance de cumplimiento</p>
                    <h1 class="display-1 fw-bold text-warning mb-0">100 %</h1>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-outline-primary btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalEntes">
        Ver listado
    </button>
</div>

{{-- MODAL --}}
<div class="modal fade" id="modalEntes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Estatus de su informe quincenal</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ente público</th>
                                <th>Fecha envió</th>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection