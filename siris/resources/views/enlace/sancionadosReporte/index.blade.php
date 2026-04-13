@extends('layouts.enlace.master')

@section('title', 'Listado de Sancionados')

@section('styles')
@vite(['resources/src/assets/scss/iconly.scss'])
{{-- Estilos necesarios para DataTables y Bootstrap 5 --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* Estilos personalizados de la plantilla base */
    .bg-light-danger { background-color: #fee2e2; color: #dc2626; }
    .breadcrumb-item a { text-decoration: none; color: #6c757d; }
    .breadcrumb-item.active { color: #4f5fbd; font-weight: bold; }
    .filtro-label { font-size: 0.8rem; color: #000; font-weight: bold; }
    .filtro-select { width: 150px; border: 1px solid #dee2e6; background-color: transparent; color: #000; font-weight: 500; }
    
    /* Personalización de la leyenda y paginación de DataTable */
    .dataTables_info { 
        color: #333 !important; 
        font-size: 0.85rem; 
        font-weight: 500; 
        padding-top: 1.5rem !important; 
    }
    .pagination .page-link { color: #4f5fbd; border: none; }
    .pagination .page-item.active .page-link { background-color: #4f5fbd; border-radius: 5px; color: white !important; }

    /* Ocultamos el buscador nativo para usar el de la plantilla */
    .dataTables_filter { display: none; } 

    #btnLimpiar:hover {
        background-color: #f1f1f1;
        color: #333;
    }
</style>
@endsection

@section('content')
{{-- Encabezado y Breadcrumb --}}
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h3 class="text-gray-800 m-0">Sancionados reporte</h3>
        <p class="text-muted small m-0">Registros oficiales de sanciones correspondientes al periodo seleccionado.</p>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item text-muted">Sancionados</li>
            <li class="breadcrumb-item active" aria-current="page">Reporte</li>
        </ol>
    </nav>
</div>

<div class="card shadow-sm" style="border-radius: 10px;">
    <div class="card-body">
        <h5 class="text-center mb-4 fw-bold text-dark">Listado de Sancionados</h5>

        {{-- SECCIÓN DE FILTROS (Año y Mes) --}}
        <div class="row mb-4 justify-content-center text-center">
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <span class="me-2 filtro-label">Año</span>
                <select class="form-select filtro-select" id="filtroEjercicio">
                    <option value="">Todos</option>
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <span class="me-2 filtro-label">Mes</span>
                <select class="form-select filtro-select" id="filtroPeriodo" style="width: 160px;">
                    <option value="">Seleccionar...</option>
                    <option value="ENERO">Enero</option>
                    <option value="FEBRERO">Febrero</option>
                    <option value="MARZO">Marzo</option>
                    <option value="ABRIL">Abril</option>
                </select>
                
                <button id="btnBuscar" class="btn ms-3 text-white fw-bold shadow-sm" style="background-color: #a54844; border-radius: 8px;">Buscar</button>
                
                <button id="btnLimpiar" class="btn ms-2 btn-light fw-bold shadow-sm border" title="Borrar filtros" style="border-radius: 8px;">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </button>
            </div>
        </div>

        <hr class="opacity-25">

        {{-- BUSCADOR MANUAL --}}
        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex align-items-center">
                <span class="me-2 small fw-bold text-dark">Buscar:</span>
                <input type="text" id="inputBusquedaReal" class="form-control form-control-sm shadow-sm" placeholder="Nombre o expediente..." style="width: 250px; border-radius: 7px;">
            </div>
        </div>

        {{-- TABLA --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="tablaSancionados" style="font-size: 0.9rem; color: #333; width: 100%;">
                <thead style="background-color: #f8fafc; border-bottom: 2px solid #dee2e6;">
                    <tr class="text-dark">
                        <th>No.</th>
                        <th>No. expediente</th>
                        <th>Nombre completo</th>
                        <th>Ente público</th>
                        <th class="text-center">Falta cometida</th>
                        <th>Tipo sanciones</th>
                        <th>Tipo sancionado</th>
                        {{-- Columnas ocultas para filtrado por script --}}
                        <th class="d-none">Año_Hidden</th>
                        <th class="d-none">Mes_Hidden</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>ARMANDO PADILLA SANCHEZ</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2026</td>
                        <td class="d-none">ENERO</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-05/2026</a></td>
                        <td>MARIA ELENA LOPEZ</td>
                        <td>MUNICIPIO</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">PECULADO</span></td>
                        <td>INHABILITACIÓN</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2026</td>
                        <td class="d-none">ENERO</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#" class="text-decoration-none fw-bold" style="color: #4f5fbd;">SP-02/2025</a></td>
                        <td>JAVIER ARTURO RANGEL</td>
                        <td>SABGOB</td>
                        <td class="text-center"><span class="badge bg-light-danger text-danger px-3">COHECHO</span></td>
                        <td>ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                        <td class="d-none">2025</td>
                        <td class="d-none">FEBRERO</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    
    // 1. Inicialización de la tabla con los parámetros de la plantilla
    var table = $('#tablaSancionados').DataTable({
        responsive: true,
        pageLength: 10,
        dom: 'rtip', // Mantiene solo tabla, info y paginación
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        },
        columnDefs: [
            { orderable: false, targets: [4] } // Desactiva orden en columna de badges si se prefiere
        ]
    });

    // 2. Buscador Manual Vinculado
    $('#inputBusquedaReal').on('keyup', function () {
        table.search(this.value).draw();
    });

    // 3. Lógica de Filtrado por Año y Mes (Columnas ocultas 7 y 8)
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var filtroAnio = $('#filtroEjercicio').val();
        var filtroMes = $('#filtroPeriodo').val();
        
        var colAnio = data[7] || ""; 
        var colMes = data[8] || ""; 

        var matchAnio = (filtroAnio === "" || colAnio === filtroAnio);
        var matchMes = (filtroMes === "" || colMes === filtroMes);

        return matchAnio && matchMes;
    });

    // 4. Botón Buscar - Redibuja aplicando los filtros del search.push
    $('#btnBuscar').on('click', function() {
        table.draw();
    });

    // 5. Botón Limpiar - Resetea los campos y la tabla
    $('#btnLimpiar').on('click', function() {
        $('#filtroEjercicio').val(''); 
        $('#filtroPeriodo').val(''); 
        $('#inputBusquedaReal').val('');
        table.search('').draw(); 
    });
    
    // Draw inicial para aplicar el filtro de "2026" por defecto
    table.draw();
});
</script>
@endsection