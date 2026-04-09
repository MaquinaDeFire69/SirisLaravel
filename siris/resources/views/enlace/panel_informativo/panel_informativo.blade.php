@extends('layouts.enlace.master')

@section('title', 'Panel Informativo')

@section('styles')
    @vite([
        'resources/src/assets/scss/iconly.scss',
        'resources/dist/assets/extensions/apexcharts/apexcharts.css'
    ])
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3 class="text-gray-800">Panel Informativo</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Panel informativo/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="row">
    <div class="col-12">
        {{-- ===== STATS CARDS ===== --}}
        <div class="row">
            
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
                        <h1 class="display-3 fw-bold text-primary mb-0">0</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </section>
    <div class="header-periodo mb-4 text-center">
        <h5 class="mb-0" style="color:#25396f;">
            <i class="bi bi-calendar3 me-2"></i>
            Fecha actual: <span class="fw-bold">16 al 28 de febrero 2026</span>
        </h5>
    </div>
    <!-- TABLE -->
    <section class="section">
        <div class="card shadow-sm border-0">
            {{-- CABECERA DE LA TABLA (Título y Buscador) --}}
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
                <h6 class="mb-0 fw-bold text-dark">Reportes quincenales</h6>
                <div style="width: 250px;">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0 text-muted">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar reporte...">
                    </div>
                </div>
            </div>

            {{-- CUERPO DE LA TABLA --}}
            <div class="card-body p-0 bg-light">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        
                        {{-- ENCABEZADO NECESARIO PARA EL SORTING --}}
                        <thead class="text-dark border-bottom">
                            <tr>
                                <th class="py-2 ps-4 border-0 fw-bold">
                                    Reporte <i class="bi bi-filter ms-1"></i>
                                </th>
                                <th class="py-2 pe-4 border-0 fw-bold">
                                    Estatus <i class="bi bi-filter ms-1"></i>
                                </th>
                            </tr>
                        </thead>

                        {{-- CUERPO DE LA TABLA (El diseño gris que armamos) --}}
                        <tbody class="bg-white">
                            <tr>
                                <td class="py-3 ps-4 border-bottom">
                                    <span class="fw-bold text-dark">Reporte de Sancionados Segunda Quincena de Febrero</span><br>
                                    <span class="text-muted">**********</span>
                                </td>
                                <td class="py-3 pe-4 border-bottom">
                                    <span class="fw-bold text-dark">Estado de cumplimiento</span><br>
                                    <span class="text-secondary">Por entregar...</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 ps-4 border-bottom-0">
                                    <span class="fw-bold text-dark">Reporte de Sancionados Primera Quincena de Febrero</span><br>
                                    <span class="text-muted">**********</span>
                                </td>
                                <td class="py-3 pe-4 border-bottom-0">
                                    <span class="fw-bold text-dark">Estado de cumplimiento</span><br>
                                    <span class="text-danger">Informe no reportado </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PIE DE TABLA: PAGINACIÓN --}}
            <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 border-top">
                <div>
                    <span class="text-muted small me-2">Items per page</span>
                    <select class="form-select form-select-sm d-inline-block w-auto text-muted">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>
                
                <div class="d-flex align-items-center">
                    <span class="text-muted small me-3">1 - 2 of 2</span>
                    <button class="btn btn-sm btn-light text-muted me-1 border"><i class="bi bi-chevron-left"></i></button>
                    <button class="btn btn-sm btn-light text-muted border"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.querySelector('.table');
        if (!table) return;

        const tbody = table.querySelector('tbody');
        const headers = table.querySelectorAll('th');
        const searchInput = document.querySelector('input[placeholder="Buscar reporte..."]');

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

        let sortDirection = 1;

        headers.forEach((header, index) => {
            const filterIcon = header.querySelector('.bi-filter');
            
            if (filterIcon) {
                header.style.cursor = 'pointer';

                header.addEventListener('click', () => {
                    const rows = Array.from(tbody.querySelectorAll('tr'));

                    const sortedRows = rows.sort((a, b) => {
                        const cellA = a.cells[index];
                        const cellB = b.cells[index];

                        const aColText = cellA ? cellA.innerText.trim() : '';
                        const bColText = cellB ? cellB.innerText.trim() : '';

                        return aColText.localeCompare(bColText, 'es', { numeric: true }) * sortDirection;
                    });

                    sortDirection *= -1;

                    tbody.innerHTML = '';
                    sortedRows.forEach(row => tbody.appendChild(row));
                });
            }
        });
    });
</script>
@endsection

@section('js')
    @vite(['resources/dist/assets/extensions/apexcharts/apexcharts.min.js'])
@endsection