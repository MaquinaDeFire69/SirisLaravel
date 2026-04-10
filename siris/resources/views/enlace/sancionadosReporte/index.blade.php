@extends('layouts.enlace.master')

@section('title', 'Listado de Sancionados')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Listado de Sancionados</li>
    </ol>
</nav>

<div class="card shadow-sm" style="border-radius: 10px;">
    <div class="card-body">
        <h5 class="text-center mb-4 fw-bold text-dark">Listado de Sancionados</h5>

        <div class="row mb-4 justify-content-center">
            <div class="col-md-4 d-flex align-items-center">
                <span class="me-2 fw-bold text-dark" style="font-size: 0.8rem;">EJERCICIO</span>
                <select class="form-select bg-light border-0" id="filtroEjercicio" style="width: 150px;">
                    <option value="2026">2026</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <span class="me-2 fw-bold text-dark" style="font-size: 0.8rem;">PERIODO INFORMADO</span>
                <select class="form-select bg-light border-0" id="filtroPeriodo" style="width: 180px;">
                    <option value="ENERO">ENERO</option>
                    <option value="FEBRERO">FEBRERO</option>
                </select>
                <button class="btn ms-3 text-white fw-bold shadow-sm" style="background-color: #a54844; border-radius: 8px;">Buscar</button>
            </div>
        </div>

        <hr class="opacity-25">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center text-muted">
                <span class="small">Mostrar</span>
                <select class="form-select form-select-sm mx-2" id="mostrarRegistros" style="width: auto;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
                <span class="small">Registros</span>
            </div>
            <div class="d-flex align-items-center text-muted">
                <span class="me-2 small">Buscar:</span>
                <input type="text" id="inputBusqueda" class="form-control form-control-sm shadow-sm" placeholder="Escribe para filtrar..." style="width: 200px;">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="tablaSancionados" style="font-size: 0.9rem; color: #333;">
                <thead style="background-color: #f8fafc; border-bottom: 2px solid #dee2e6;">
                    <tr class="text-dark">
                        <th class="fw-bold">No.</th>
                        <th class="fw-bold">No. expediente</th>
                        <th class="fw-bold">Nombre completo</th>
                        <th class="fw-bold">Ente público</th>
                        <th class="fw-bold text-center">Falta cometida</th>
                        <th class="fw-bold">Tipo sanciones</th>
                        <th class="fw-bold">Tipo sancionado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="text-dark">ARMANDO PADILLA SANCHEZ</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="text-dark">JAVIER ARTURO RANGEL ABELAR</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="text-dark">ARIEL ALEJANDRO RIVERO MOO</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="text-dark">JOSE LUIS CHAVEZ ZETINA</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-dark text-white rounded-3 shadow-sm">
            <p class="mb-0 small" id="infoRegistros">
                <i class="bi bi-info-circle me-2"></i> Mostrando registros filtrados
            </p>
            <span class="badge bg-secondary">Ejercicio 2026</span>
        </div>
    </div>
</div>

<style>
    .bg-light-danger { background-color: #fee2e2; color: #dc2626; }
    .breadcrumb-item a { text-decoration: none; color: #6c757d; }
    .breadcrumb-item.active { color: #4f5fbd; font-weight: bold; }
</style>

<script>
    document.getElementById('inputBusqueda').addEventListener('keyup', function() {
        let filtro = this.value.toLowerCase();
        let filas = document.querySelectorAll('#tablaSancionados tbody tr');

        filas.forEach(fila => {
            let textoFila = fila.innerText.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? "" : "none";
        });
    });
</script>
@endsection