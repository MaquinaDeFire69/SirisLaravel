@extends('layouts.admin.master')

@section('title', 'Sancionados')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-heading">

    {{-- HEADER --}}
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Entes públicos sancionados</h3>
            <p class="text-subtitle text-muted">El presente apartado visualiza la información del estatus de sanción de un ente público</p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Sancionados</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- FILTROS --}}
    <div class="card border mb-4">
        <div class="card-header bg-light fw-bold">
            Filtros de búsqueda
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('sancionados.sancionados') }}" id="formFiltros">
                <div class="row mb-3">
                    {{-- SANCIONADOS --}}
                    <div class="col-md-6">
                        <label class="fw-bold">Sancionados:</label>
                        <select name="sancionado" class="form-select">
                            <option value="">Seleccione un tipo de sancionado...</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ request('sancionado') == $tipo ? 'selected' : '' }}>
                                    {{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PERIODOS --}}
                    <div class="col-md-6">
                        <label class="fw-bold">Periodos informativos:</label>
                        <select name="periodo" class="form-select">
                            <option value="">Seleccione...</option>
                            @foreach($periodos as $periodo)
                                <option value="{{ $periodo }}" {{ request('periodo') == $periodo ? 'selected' : '' }}>
                                    {{ $periodo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- ENTES --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="fw-bold">*Entes públicos proveedores</label>
                        <select name="ente" class="form-select">
                            <option value="">Seleccione...</option>
                            @foreach($entes as $ente)
                                <option value="{{ $ente }}" {{ request('ente') == $ente ? 'selected' : '' }}>
                                    {{ $ente }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- BOTONES --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search"></i> Buscar sancionados
                    </button>

                    <button type="button" onclick="limpiarFiltros()" class="btn btn-outline-secondary">
                        <i class="bi bi-eraser"></i> Limpiar filtros de búsqueda
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPT LIMPIAR --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function limpiarFiltros() {
            // Limpia visualmente
            document.getElementById('formFiltros').reset();

            // Redirige sin parámetros (esto limpia backend)
            window.location.href = "{{ route('sancionados.sancionados') }}";
        }

        document.getElementById('formFiltros').addEventListener('submit', function(e) {
            const ente = document.querySelector('select[name="ente"]');

            if (!ente.value) {
                e.preventDefault(); // Evita envío

                Swal.fire({
                    icon: 'warning',
                    title: 'Campo obligatorio',
                    text: 'Debes seleccionar un ente público proveedor',
                    confirmButtonText: 'Entendido'
                });

                ente.focus();
            }
        });
    </script>

    {{-- TABLA --}}
    <div class="card">
        <div class="card-header text-center fw-bold">
            Listado de sancionados
        </div>

        <div class="card-body">
            {{-- TOP CONTROLS --}}
            <div class="d-flex justify-content-between mb-2">
                <div>
                    Mostrar 
                    <select class="form-select d-inline-block" style="width: 80px;">
                        <option>5</option>
                        <option>10</option>
                        <option>25</option>
                    </select>
                    Registros
                </div>

                <div>
                    Buscar:
                    <input type="text" class="form-control d-inline-block" style="width: 200px;">
                </div>
            </div>

            {{-- TABLA --}}
            <div class="table-responsive datatable-minimal">
                <table class="table">
                    <thead>
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

            {{-- PAGINACIÓN --}}
            <div class="d-flex justify-content-between mt-3">
                <div>
                    Mostrando registros del 1 al 5 de un total de 15
                </div>

                <div>
                    <button class="btn btn-sm btn-outline-secondary">Anterior</button>
                    <button class="btn btn-sm btn-warning">1</button>
                    <button class="btn btn-sm btn-outline-secondary">2</button>
                    <button class="btn btn-sm btn-outline-secondary">3</button>
                    <button class="btn btn-sm btn-outline-secondary">Siguiente</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
