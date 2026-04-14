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
                        <a href="">Sancionados</a>
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
                <span class="badge bg-success ms-2" title="ID dinámico recibido de la ruta">ID BD: {{ $id ?? 'N/A' }}</span>
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

                <div class="col-md-4 mb-2">
                    <strong>Años de Inhabilitación:</strong> {{ $datosExpediente['anios'] }}
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Meses de Inhabilitación:</strong> N/A
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Días de Inhabilitación:</strong> N/A
                </div>
            </div>

            {{-- SECCIÓN: SANCIONES APLICADAS --}}
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Sanciones aplicadas:
            </div>

            <div class="row px-2 mb-4">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-secondary bg-opacity-10">
                                <tr>
                                    <th><strong class="text-dark">Sanción</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datosExpediente['sanciones'] as $index => $sancion)
                                <tr>
                                    <td class="bg-secondary {{ $index % 2 == 0 ? 'bg-opacity-10' : 'bg-opacity-25' }}">
                                        <strong class="text-dark">{{ $sancion }}</strong>
                                    </td>                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- BOTONES INFERIORES --}}
            <div class="text-center mt-5 mb-2">
                {{-- Nota: Asumo que la ruta sancionados.sancionados ya existe por tu compañero --}}
                <a href="{{ route('sancionados.sancionados') }}" type="submit" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Regresar al listado de sancionados
                </a>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-file-earmark-pdf"></i> Exportar a PDF la información del expediente
                </button>
            </div>

        </div>
    </div>

</div>
@endsection
