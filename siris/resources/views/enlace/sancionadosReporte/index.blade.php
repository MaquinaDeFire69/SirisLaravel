@extends('layouts.enlace.master')

@section('title', 'Listado de Sancionados')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3 class="text-gray-800">Lista de sancionados</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Lista de sancionados/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content card shadow-sm border-0">
    <div class="card-body">
        <h5 class="text-center mb-4 fw-bold text-dark">Listado de Sancionados</h5>

        {{-- CONTROLES SUPERIORES --}}
        <div class="row mb-4 justify-content-center">
            <div class="col-md-4 d-flex align-items-center">
                <span class="me-2 fw-bold text-muted small text-uppercase">EJERCICIO</span>
                <select class="form-select bg-light border-0 text-center" id="filtroEjercicio" style="width: 150px;">
                    <option value="2026">2026</option>
                    <option value="2025">2025</option>
                </select>
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <span class="me-2 fw-bold text-muted small text-uppercase">PERIODO INFORMADO</span>
                <select class="form-select bg-light border-0 text-center" id="filtroPeriodo" style="width: 180px;">
                    <option value="ENERO">ENERO</option>
                    <option value="FEBRERO">FEBRERO</option>
                </select>
                <button class="btn ms-3 text-white px-4" style="background-color: #a54844;">Buscar</button>
            </div>
        </div>

        <hr class="text-muted opacity-25">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center text-muted small">
                <span>Mostrar</span>
                <select class="form-select form-select-sm mx-2 text-center bg-light border-0" id="mostrarRegistros" style="width: auto;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
                <span>Registros</span>
            </div>
            <div class="d-flex align-items-center" style="width: 250px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="inputBusqueda" class="form-control border-start-0 ps-0" placeholder="Escribe para filtrar...">
                </div>
            </div>
        </div>

        {{-- TABLA --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center mb-0" id="tablaSancionados">
                
                {{-- ENCABEZADO GRIS CON ÍCONOS DE FILTRO --}}
                <thead style="background-color: #e2e8f0; color: #64748b;">
                    <tr>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            No. <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            No. expediente <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            Nombre completo <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            Ente público <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            Falta cometida <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            Tipo sanciones <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                        <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                            Tipo sancionado <i class="bi bi-filter ms-1 opacity-75"></i>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="py-3 border-bottom text-muted">1</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">ARMANDO PADILLA SANCHEZ</td>
                        <td class="py-3 border-bottom text-muted">SABGOB</td>
                        <td class="py-3 border-bottom text-muted">PECULADO</td>
                        <td class="py-3 border-bottom text-muted">INHABILITACIÓN, ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">2</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">LAURA SANSORES PEÑA</td>
                        <td class="py-3 border-bottom text-muted">SABGOB</td>
                        <td class="py-3 border-bottom text-muted">NEPOTISMO</td>
                        <td class="py-3 border-bottom text-muted">ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA MORAL</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">3</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">JOSE LUIS CHAVEZ ZETINA</td>
                        <td class="py-3 border-bottom text-muted">SABGOB</td>
                        <td class="py-3 border-bottom text-muted">PECULADO</td>
                        <td class="py-3 border-bottom text-muted">INHABILITACIÓN, ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">4</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">FERNANDA CAMACHO JACINTO</td>
                        <td class="py-3 border-bottom text-muted">SABGOB</td>
                        <td class="py-3 border-bottom text-muted">NEPOTISMO</td>
                        <td class="py-3 border-bottom text-muted">ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA MORAL</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">5</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">JAVIER ARTURO RANGEL AVELAR</td>
                        <td class="py-3 border-bottom text-muted">SABGOB</td>
                        <td class="py-3 border-bottom text-muted">PECULADO</td>
                        <td class="py-3 border-bottom text-muted">INHABILITACIÓN, ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">6</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">ISAI MISAEL MAGAÑA TUZ</td>
                        <td class="py-3 border-bottom text-muted">SESA</td>
                        <td class="py-3 border-bottom text-muted">NEPOTISMO</td>
                        <td class="py-3 border-bottom text-muted">INHABILITACIÓN, ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">7</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">MADOX QUE FAJARDO</td>
                        <td class="py-3 border-bottom text-muted">SEDETUR</td>
                        <td class="py-3 border-bottom text-muted">PECULADO</td>
                        <td class="py-3 border-bottom text-muted">INHABILITACIÓN, ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td class="py-3 border-bottom text-muted">8</td>
                        <td class="py-3 border-bottom"><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td class="py-3 border-bottom text-dark fw-medium">ARIEL RIVERO MOO</td>
                        <td class="py-3 border-bottom text-muted">SESA</td>
                        <td class="py-3 border-bottom text-muted">NEPOTISMO</td>
                        <td class="py-3 border-bottom text-muted">ECONÓMICA</td>
                        <td class="py-3 border-bottom text-muted">PERSONA MORAL</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-3">
            <p class="mb-0 text-muted small" id="infoRegistros">Mostrando registros filtrados</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('tablaSancionados');
        if (!table) return;

        const tbody = table.querySelector('tbody');
        const headers = table.querySelectorAll('th[data-sortable="true"]');
        const searchInput = document.getElementById('inputBusqueda');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                const rows = tbody.querySelectorAll('tr');

                rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    if (rowText.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
        if (headers.length === 0) return;

        headers.forEach((header, index) => {
            header.sortDirection = 1;

            header.addEventListener('click', () => {
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const icon = header.querySelector('i');
                headers.forEach(h => {
                    const hIcon = h.querySelector('i');
                    if (hIcon) hIcon.className = 'bi bi-filter ms-1 opacity-75';
                });
                if (header.sortDirection === 1) {
                    icon.className = 'bi bi-sort-alpha-down text-primary ms-1';
                } else {
                    icon.className = 'bi bi-sort-alpha-up text-primary ms-1';
                }
                const sortedRows = rows.sort((a, b) => {
                    const cellA = a.cells[index];
                    const cellB = b.cells[index];

                    const aColText = cellA ? cellA.innerText.trim() : '';
                    const bColText = cellB ? cellB.innerText.trim() : '';

                    return aColText.localeCompare(bColText, 'es', { numeric: true }) * header.sortDirection;
                });
                header.sortDirection *= -1;
                tbody.innerHTML = '';
                sortedRows.forEach(row => tbody.appendChild(row));
            });
        });
    });
</script>
@endsection