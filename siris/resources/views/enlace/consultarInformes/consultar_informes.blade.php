@extends('layouts.enlace.master')

@section('title', 'Consultar Informes')

@section('styles')
    @vite([
        'resources/src/assets/scss/iconly.scss',
        'resources/dist/assets/extensions/apexcharts/apexcharts.css'
    ])
    <style>
        /* Sincronización de estilos con Sancionados */
        .page-heading { margin-bottom: 0.5rem !important; }
        .breadcrumb-item a { text-decoration: none; color: #6c757d; }
        .breadcrumb-item.active { color: #4f5fbd; font-weight: bold; }
        
        .filtro-label { font-size: 0.8rem; color: #000; font-weight: bold; }
        .filtro-select { width: 150px; border: 1px solid #dee2e6; background-color: transparent; color: #000; font-weight: 500; }
        
        /* Estilo de Tabla similar a Sancionados */
        .table thead th { 
            background-color: #f8fafc; 
            font-size: 0.9rem; 
            color: #333; 
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody td { font-size: 0.9rem; color: #333; }
        
        .badge-custom { font-size: 0.75rem; font-weight: bold; padding: 0.4rem 0.8rem; }
    </style>
@endsection

@section('content')
{{-- CABECERA: Título, Label y Breadcrumbs en la misma línea --}}
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h3 class="text-gray-800 m-0">Consultar informes</h3>
            <p class="text-muted small m-0">El presente apartado muestra el historial de reportes quincenales oficiales.</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a>Consultar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informe</li>
            </ol>
        </nav>
    </div>
</div>

<div class="page-content">
    {{-- FILTROS DE BÚSQUEDA (Estilo Sancionados) --}}
    <div class="card shadow-sm mb-4" style="border-radius: 10px;">
        <div class="card-body py-3">
            <form method="GET" action="{{ url()->current() }}" class="row justify-content-center align-items-center">
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <span class="me-2 filtro-label">Año</span>
                    <select name="ejercicio" class="form-select filtro-select">
                        <option value="">Todos</option>
                        <option value="2026" {{ request('ejercicio') == '2026' ? 'selected' : '' }}>2026</option>
                        <option value="2025" {{ request('ejercicio') == '2025' ? 'selected' : '' }}>2025</option>
                    </select>
                </div>
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <span class="me-2 filtro-label">Mes</span>
                    <select name="periodo" class="form-select filtro-select" style="width: 160px;">
                        <option value="">Seleccionar...</option>
                        <option value="ENERO" {{ request('periodo') == 'ENERO' ? 'selected' : '' }}>Enero</option>
                        <option value="FEBRERO" {{ request('periodo') == 'FEBRERO' ? 'selected' : '' }}>Febrero</option>
                    </select>
                    
                    <button type="submit" class="btn ms-3 text-white fw-bold shadow-sm" style="background-color: #a54844; border-radius: 8px;">Buscar</button>
                    
                    <a href="{{ url()->current() }}" class="btn ms-2 btn-light fw-bold shadow-sm border" style="border-radius: 8px;">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- TABLA DE INFORMES --}}
    <section class="section">
        <div class="card shadow-sm border-0" style="border-radius: 10px;">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
                <h6 class="mb-0 fw-bold text-dark">Listado de informes quincenales</h6>
                <div class="d-flex align-items-center">
                    <span class="me-2 small fw-bold text-dark">Buscar:</span>
                    <input type="text" id="searchInput" class="form-control form-control-sm shadow-sm" placeholder="Buscar reporte..." style="width: 250px; border-radius: 7px;">
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="tablaInformes">
                        <thead>
                            <tr>
                                <th class="py-3 ps-4 border-0">No. reporte <i class="bi bi-filter ms-1"></i></th>
                                <th class="py-3 border-0">Periodo informe <i class="bi bi-filter ms-1"></i></th>
                                <th class="py-3 border-0">Fecha de envío <i class="bi bi-filter ms-1"></i></th>
                                <th class="py-3 border-0">Estatus <i class="bi bi-filter ms-1"></i></th>
                                <th class="py-3 pe-4 border-0 text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($informes as $informe)
                            <tr>
                                <td class="py-3 ps-4 border-bottom text-muted fw-medium">{{ $informe['no'] }}</td>
                                <td class="py-3 border-bottom text-dark fw-bold">{{ $informe['periodo'] }}</td>
                                <td class="py-3 border-bottom text-muted small">{{ $informe['fecha'] }}</td>
                                <td class="py-3 border-bottom">
                                    @if($informe['estatus'] == 'Normal')
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 badge-custom border border-primary border-opacity-25 rounded-1">NORMAL</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 badge-custom border border-danger border-opacity-25 rounded-1">EXTEMPORÁNEO</span>
                                    @endif
                                </td>
                                <td class="py-3 pe-4 border-bottom text-center">
                                    <button class="btn btn-sm {{ $informe['estatus'] == 'Normal' ? 'btn-primary' : 'btn-secondary' }} rounded-1 shadow-sm px-3" {{ $informe['estatus'] == 'Extemporaneo' ? 'disabled' : '' }}>
                                        <i class="bi bi-download me-1"></i> Acuse
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 border-top">
                <span class="text-dark fw-bold" style="font-size: 0.85rem;">Mostrando informes registrados</span>
                <div class="pagination-container">
                    <button class="btn btn-sm btn-light border text-muted px-2">‹</button>
                    <button class="btn btn-sm btn-primary border px-2 ms-1" style="background-color: #4f5fbd;">1</button>
                    <button class="btn btn-sm btn-light border text-muted px-2 ms-1">›</button>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tbody = document.querySelector('#tablaInformes tbody');
        const searchInput = document.getElementById('searchInput');

        // Buscador sincronizado
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                const rows = tbody.querySelectorAll('tr');
                rows.forEach(row => {
                    row.style.display = row.innerText.toLowerCase().includes(searchTerm) ? '' : 'none';
                });
            });
        }

        // Ordenamiento (Sorting)
        const headers = document.querySelectorAll('th');
        let direction = 1;
        headers.forEach((header, index) => {
            if(index === 4) return; // No ordenar columna de Acción
            header.style.cursor = 'pointer';
            header.addEventListener('click', () => {
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const sorted = rows.sort((a, b) => {
                    return a.cells[index].innerText.trim().localeCompare(b.cells[index].innerText.trim(), 'es', {numeric: true}) * direction;
                });
                direction *= -1;
                tbody.append(...sorted);
            });
        });
    });
</script>
@endsection

@section('js')
    @vite(['resources/dist/assets/extensions/apexcharts/apexcharts.min.js'])
@endsection