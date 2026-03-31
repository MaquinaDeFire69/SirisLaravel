@extends('layouts.enlace.master')

@section('title', 'Panel Informativo')

@section('styles')
    @vite([
        'resources/src/assets/scss/iconly.scss',
        'resources/dist/assets/extensions/apexcharts/apexcharts.css'
    ])
    <style>
        .cardPeriodo{
            background-color: #9694ff;
        }
    </style>
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
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card cardPeriodo text-white"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-white font-semibold">Periodo en curso</h6>
                                    <h4 class="text-white font-semibold">16-28 Feb 2026</h4>
                                    <h6 class="text-white font-extrabold mb-0">Estatus: por entregar</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card bg-primary"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-white font-semibold">Informes no reportados</h6>
                                    <h4 class="text-white font-semibold">0</h4>
                                    <h6 class="text-white font-extrabold mb-0 invisible">&nbsp;</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="header-periodo mb-4 text-center">
        <h5 class="mb-0" style="color:##25396f;">
            <i class="bi bi-calendar3 me-2"></i>
            Fecha actual: <span class="fw-bold">16 al 28 de febrero 2026</span>
        </h5>
    </div>
    <!-- TABLE -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Reportes quincenales</h6>
                    </div>
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="fw-bold">Reporte de Sancionados Segunda Quincena de Febrero</span><br>
                                            <span>**********</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">Estado de cumpllimiento</span><br>
                                            <span>Por entregar...</span>
                                        </td>
                                    </tr>
                                    <!-- Informe no reportado -->
                                     <tr>
                                        <td>
                                            <span class="fw-bold">Reporte de Sancionados Primera Quincena de Febrero</span><br>
                                            <span>**********</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">Estado de cumpllimiento</span><br>
                                            <span class="text-danger">Informe no reportado </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    @vite(['resources/dist/assets/extensions/apexcharts/apexcharts.min.js'])
@endsection