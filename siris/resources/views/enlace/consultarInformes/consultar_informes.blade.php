@extends('layouts.enlace.master')

@section('title', 'Consultar Informes')

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
                <h3 class="text-gray-800">Consultar informes</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Consultar informes/</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    {{-- FILTROS DE BÚSQUEDA --}}
    <form method="GET" action="{{ url()->current() }}" class="row mb-4 justify-content-center align-items-end">
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">EJERCICIO</label>
                <select name="ejercicio" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="2026" {{ request('ejercicio') == '2026' ? 'selected' : '' }}>2026</option>
                    <option value="2025" {{ request('ejercicio') == '2025' ? 'selected' : '' }}>2025</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">PERIODO INFORMADO</label>
                <select name="periodo" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="ENERO" {{ request('periodo') == 'ENERO' ? 'selected' : '' }}>ENERO</option>
                    <option value="FEBRERO" {{ request('periodo') == 'FEBRERO' ? 'selected' : '' }}>FEBRERO</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-danger text-white px-4" style="background-color: #a52a2a; border-color: #a52a2a;">
                Buscar
            </button>
        </div>
    </form>

    {{-- TABLA DE INFORMES --}}
    <section class="section">
        <div class="card shadow-sm border-0">
            
            {{-- CABECERA DE LA TABLA (Título y Buscador) --}}
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
                <h6 class="mb-0 fw-bold text-dark">Listado de informes quincenales</h6>
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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        
                        {{-- ENCABEZADO GRIS (Basado en tu imagen) --}}
                        <thead style="background-color: #e2e8f0; color: #64748b;">
                            <tr>
                                {{-- Agregamos hover via CSS inline para el cursor y data-sortable para el script --}}
                                <th class="py-3 ps-4 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                                    No. reporte <i class="bi bi-filter ms-1 opacity-75"></i>
                                </th>
                                <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                                    Periodo informe <i class="bi bi-filter ms-1 opacity-75"></i>
                                </th>
                                <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                                    Fecha de envío <i class="bi bi-filter ms-1 opacity-75"></i>
                                </th>
                                <th class="py-3 border-0 fw-semibold" style="cursor: pointer;" data-sortable="true" title="Clic para ordenar">
                                    Estatus <i class="bi bi-filter ms-1 opacity-75"></i>
                                </th>
                                <th class="py-3 pe-4 border-0 fw-semibold text-center">
                                    Acción
                                </th>
                            </tr>
                        </thead>

                        {{-- CUERPO DE LA TABLA (DINÁMICO) --}}
                        <tbody class="bg-white">
                            @foreach($informes as $informe)
                            <tr>
                                <td class="py-3 ps-4 border-bottom text-muted fw-medium">{{ $informe['no'] }}</td>
                                <td class="py-3 border-bottom text-dark fw-bold">{{ $informe['periodo'] }}</td>
                                <td class="py-3 border-bottom text-muted">{{ $informe['fecha'] }}</td>
                                <td class="py-3 border-bottom">
                                    @if($informe['estatus'] == 'Normal')
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 border border-primary border-opacity-25 rounded-1">Normal</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 border border-danger border-opacity-25 rounded-1">Extemporaneo</span>
                                    @endif
                                </td>
                                <td class="py-3 pe-4 border-bottom text-center">
                                    <button class="btn btn-sm {{ $informe['estatus'] == 'Normal' ? 'btn-primary' : 'btn-secondary' }} rounded-1" {{ $informe['estatus'] == 'Extemporaneo' ? 'disabled' : '' }}>
                                        Descargar acuse
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                            {{-- Filas vacías de relleno (simulando el diseño) --}}
                            @for ($i = 0; $i < 4; $i++)
                            <tr>
                                <td class="py-3 ps-4 border-bottom text-muted">***</td>
                                <td class="py-3 border-bottom text-muted">***</td>
                                <td class="py-3 border-bottom text-muted">***</td>
                                <td class="py-3 border-bottom"><span class="badge bg-light text-muted px-3 py-2">***</span></td>
                                <td class="py-3 pe-4 border-bottom text-center"></td>
                            </tr>
                            @endfor
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
                    <span class="text-muted small me-3">1 - 10 of 209</span>
                    <button class="btn btn-sm btn-light text-muted me-1 border"><i class="bi bi-chevron-left"></i></button>
                    <button class="btn btn-sm btn-light text-muted border"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.querySelector('.table');
            if (!table) return;

            const tbody = table.querySelector('tbody');
            const headers = table.querySelectorAll('th[data-sortable="true"]');
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
</div>
@endsection

@section('js')
    @vite(['resources/dist/assets/extensions/apexcharts/apexcharts.min.js'])
@endsection