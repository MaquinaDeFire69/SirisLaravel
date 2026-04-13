@extends('layouts.admin.master')

@section('title', 'Sancionados')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.css',
])
@endsection

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Sancionados</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información del estatus de sanción de un ente público
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('panel-informativo') }}">Sancionados</a>
                    </li>
                    <li class="breadcrumb-item active">Reportes</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<br>

<div class="page-content">

    {{-- FILTROS --}}
    <section class="basic-choices">
        <div class="card">

            <div class="card-body">
                <form method="GET" action="{{ route('sancionados.sancionados') }}" id="formFiltros">

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <h6>Sancionados</h6>
                            <select name="sancionado" class="form-select text-dark fw-bold">
                                <option value="">Seleccione un tipo de sancionado...</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo }}" {{ request('sancionado') == $tipo ? 'selected' : '' }}>
                                        {{ $tipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <h6>Periodos informativos</h6>
                            <select name="periodo" class="form-select text-dark fw-bold">
                                <option value="">Seleccione...</option>
                                @foreach($periodos as $periodo)
                                    <option value="{{ $periodo }}" {{ request('periodo') == $periodo ? 'selected' : '' }}>
                                        {{ $periodo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h6>Entes públicos proveedores</h6>
                            <select name="ente" class="form-select text-dark fw-bold">
                                <option value="">Seleccione...</option>
                                @foreach($entes as $ente)
                                    <option value="{{ $ente }}" {{ request('ente') == $ente ? 'selected' : '' }}>
                                        {{ $ente }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-search me-2"></i>
                                Buscar sancionados
                            </button>
                            <button type="button" onclick="limpiarFiltros()" class="btn btn-outline-primary">
                                <i class="bi bi-eraser me-2"></i>
                                Limpiar filtros de búsqueda
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


    {{-- TABLA --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Listado de sancionados
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>No. expediente</th>
                                <th>Nombre completo</th>
                                <th>Ente público</th>
                                <th>Falta cometida</th>
                                <th>Tipo sanciones</th>
                                <th>Tipo sancionado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($sancionados as $index => $s)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('sancionados.info_expediente', $s['id']) }}" class="text-primary fw-bold">
                                        {{ $s['expediente'] }}
                                    </a>
                                </td>
                                <td>{{ $s['nombre'] }}</td>
                                <td>{{ $s['ente'] }}</td>
                                <td>{{ $s['falta'] }}</td>
                                <td>{{ $s['sancion'] }}</td>
                                <td>{{ $s['tipo'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('js')

@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])

<script>
function limpiarFiltros() {
    document.getElementById('formFiltros').reset();
    window.location.href = "{{ route('sancionados.sancionados') }}";
}

document.getElementById('formFiltros').addEventListener('submit', function(e) {
    const ente = document.querySelector('select[name="ente"]');

    if (!ente.value) {
        e.preventDefault();

        Swal.fire({
            icon: 'warning',
            title: 'Campo obligatorio',
            text: 'Debes seleccionar un ente público proveedor',
            confirmButtonText: 'Entendido'
        });

        ente.focus();
    }
});


$(document).ready(function () {
    $('#table1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        language: {
            lengthMenu: "_MENU_ registros por página",
            search: "Buscar:",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            zeroRecords: "No se encontraron resultados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "›",
                previous: "‹"
            }
        }
    });
});
</script>

@endsection