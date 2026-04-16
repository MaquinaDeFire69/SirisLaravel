@extends('layouts.admin.master')

@section('title', 'Entes públicos')

@section('styles')
@vite([
'resources/src/assets/scss/iconly.scss',
'resources/dist/assets/extensions/jquery/jquery.min.js',
])
@endsection

@section('content')
<div class="page-title">

    <!-- TITULO -->
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Configuración</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los entes públicos disponibles
            </p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Entes públicos
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="page-content">
        <section class="section">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 align-self-start">
                            <h5 class="card-title">Listado de entes públicos</h5>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 align-self-end text-end">
                            <button class="btn btn-success btn-sm">
                                <i class="bi bi-database-add"></i> Importar entes públicos
                            </button>
                            <button class="btn btn-warning btn-sm">
                                <i class="bi bi-check2-square"></i> Validar entes públicos
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <!-- BOTONES -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                       
                    </div>

                    <!-- TABLA -->
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead class="bg-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Ente público</th>
                                    <th>Id_S3</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($entes as $index => $ente)
                                <tr class="fs-6">
                                    <td align="center"><small>{{ $index + 1 }}</small></td>
                                    <td align="center"><small>{{ $ente['nombre'] }}</small></td>
                                    <td align="center"><small>{{ $ente['id_s3'] }}</small></td>
                                    <td align="center">
                                        <span class="badge {{ $ente['estatus'] == 'Activo' ? 'bg-success' : 'bg-danger' }}">
                                           <small> {{ $ente['estatus'] }}</small>
                                        </span>    
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </section>
    </div>

</div>

@endsection


@section('js')

@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
])

@endsection