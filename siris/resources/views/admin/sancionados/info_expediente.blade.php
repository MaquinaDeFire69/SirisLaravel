@extends('layouts.admin.master')

@section('title', 'Información del Expediente')

@section('styles')
    @vite(['resources/src/assets/scss/iconly.scss'])
@endsection

@section('content')
<div class="page-heading">

    {{-- HEADER --}}
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3 class="text-purple" style="color: #4a148c;">Información del expediente</h3>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('sancionados.sancionados') }}">Sancionados</a>
                    </li>
                    <li class="breadcrumb-item active">Expediente</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="card border mb-4">
        
        <div class="card-header text-center fw-bold fs-5" style="color: #4a148c;">
            Información del expediente
        </div>

        <div class="card-body">

            {{-- SECCIÓN: DATOS GENERALES --}}
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Datos generales del sancionado 
                <span class="badge bg-success ms-2">ID BD: {{ $id ?? 'N/A' }}</span>
            </div>
            
            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Expediente:</strong> {{ $datosExpediente['numero'] }}
                </div>
                <div class="col-12 mb-2">
                    <strong>Nombre:</strong> {{ $datosExpediente['nombre'] }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>CURP:</strong> {{ $datosExpediente['curp'] }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>RFC:</strong> {{ $datosExpediente['rfc'] }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Sexo:</strong> {{ $datosExpediente['sexo'] }}
                </div>
            </div>

            {{-- SECCIÓN: INFORMACIÓN DE LA SANCIÓN --}}
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Información de la sanción
            </div>

            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Institución que sanciona:</strong> {{ $datosExpediente['institucion'] }}
                </div>
                <div class="col-12 mb-3">
                    <strong>Falta Cometida:</strong> {{ $datosExpediente['falta_cometida'] }}
                </div>
                
                <div class="col-md-3 mb-3">
                    <strong>Normatividad:</strong> {{ $datosExpediente['normatividad'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Artículo:</strong> {{ $datosExpediente['articulo'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fracción:</strong> {{ $datosExpediente['fraccion'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Falta:</strong> {{ $datosExpediente['falta'] }}
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Fecha de Resolución:</strong> {{ $datosExpediente['fecha_resolucion'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha de Notificación:</strong> {{ $datosExpediente['fecha_notificacion'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Inicio Inhabilitación:</strong> {{ $datosExpediente['fecha_inicio_inhab'] }}
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Fin Inhabilitación:</strong> {{ $datosExpediente['fecha_fin_inhab'] }}
                </div>
            </div>

            {{-- SECCIÓN: SANCIONES APLICADAS --}}
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Sanciones aplicadas:
            </div>

            <div class="row px-4 mb-4">
                <div class="col-12">
                    <ul class="list-group list-group-flush">
                        @forelse($datosExpediente['sanciones'] as $sancion)
                            {{-- Usamos align-items-start para que el icono se quede arriba si el texto es largo --}}
                            <li class="list-group-item d-flex align-items-start border-0 px-0 py-1">
                                {{-- El icono tiene un pequeño margen superior (mt-1) para nivelarse con la primera línea de texto --}}
                                <i class="bi bi-caret-right-fill text-primary me-2 mt-1" style="font-size: 0.8rem;"></i>
                                <span class="text-dark fw-bold" style="line-height: 1.5;">
                                    {{ $sancion }}
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted border-0">No hay sanciones registradas.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            {{-- BOTONES INFERIORES (MODIFICADO PARA MANTENER FILTROS) --}}
            <div class="text-center mt-5 mb-2">
                <a href="{{ route('sancionados.sancionados', request()->except('id')) }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Regresar al listado de sancionados
                </a>
                <button type="button" class="btn btn-primary btn-sm">
                    <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF
                </button>
            </div>

        </div>
    </div>

</div>
@endsection