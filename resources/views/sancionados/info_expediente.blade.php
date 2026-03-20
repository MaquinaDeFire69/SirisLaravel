@extends('layouts.master')

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
                    <li class="breadcrumb-item"><a href="{{ route('sancionados.sancionados') }}">Sancionados</a></li>
                    <li class="breadcrumb-item text-warning fw-bold active" aria-current="page">Expediente</li>
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
                <span class="badge bg-danger ms-2" title="ID dinámico recibido de la ruta">ID BD: {{ $id ?? 'N/A' }}</span>
            </div>
            
            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Expediente:</strong> SP-01/2026
                </div>
                <div class="col-12 mb-2">
                    <strong>Nombre:</strong> ARMANDO PADILLA SANCHEZ
                </div>
                <div class="col-md-4 mb-2">
                    <strong>CURP:</strong> SAPA890514HQRCMR99
                </div>
                <div class="col-md-4 mb-2">
                    <strong>RFC:</strong> SAPA890514MR9
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Sexo:</strong> MASCULINO
                </div>
            </div>

            {{-- SECCIÓN: INFORMACIÓN DE LA SANCIÓN --}}
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Información de la sanción
            </div>

            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Institución que sanciona:</strong> SABGOB – Secretaría Anticorrupción y Buen Gobierno
                </div>
                <div class="col-12 mb-3">
                    <strong>Falta Cometida:</strong> Abuso de Funciones
                </div>
                
                <div class="col-md-3 mb-3">
                    <strong>Normatividad:</strong> Normatividad vigente en la ley
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Artículo:</strong> Artículo 143 y 144
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fracción:</strong> Fracción 3era. Y 5ta.
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Falta:</strong> Grave
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Fecha de Resolución:</strong> 2025-12-01
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha de Notificación:</strong> 2025-12-20
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Inicio Inhabilitación:</strong> 2026-01-15
                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Fin Inhabilitación:</strong> 2027-01-15
                </div>

                <div class="col-md-4 mb-2">
                    <strong>Años de Inhabilitación:</strong> 1
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
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Sanción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-secondary bg-opacity-10">Inhabilitación</td>
                                </tr>
                                <tr>
                                    <td class="bg-secondary bg-opacity-25">Económica</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- BOTONES INFERIORES --}}
            <div class="text-center mt-5 mb-2">
                <a href="{{ route('sancionados.sancionados') }}" class="btn btn-outline-secondary me-3 fw-bold text-dark">
                    <i class="bi bi-arrow-left-circle" style="color: #4a148c;"></i> Regresar al listado de sancionados
                </a>
                <button class="btn btn-outline-secondary fw-bold text-dark">
                    <i class="bi bi-file-earmark-pdf" style="color: #4a148c;"></i> Exportar a PDF la información del expediente
                </button>
            </div>

        </div>
    </div>

</div>
@endsection