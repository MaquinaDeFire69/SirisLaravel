@extends('layouts.admin.master')

@section('title', 'Usuarios')

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
            <h3>Configuración</h3>
            <p class="text-subtitle text-muted">
                El presente apartado visualiza la información de los usuarios disponibles
            </p>
        </div>

        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<br>

<div class="page-content">
<section class="section">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Listado de usuarios
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead class="bg-light">
                        <tr>
                            <th>No.</th>
                            <th>Usuario</th>
                            <th>Ente público</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($registros_usuarios as $index => $usuario)
                        <tr class="fs-6">
                            <td align="center"><small>{{ $index + 1 }}</small></td>
                            <td align="center"><small>{{ $usuario['nombre'] }}</small></td>
                            <td align="center"><small>{{ $usuario['ente'] }}</small></td>
                            <td align="center"><small>{{ $usuario['correo'] }}</small></td>
                            <td align="center"><small>{{ $usuario['tipo'] }}</small></td>
                            <td align="center">
                                <span class="badge {{ $usuario['estatus'] == 'ACTIVO' ? 'bg-success' : 'bg-danger' }}">
                                    <small>{{ $usuario['estatus'] }}</small>
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

@endsection


@section('js')

@vite([
'resources/dist/assets/extensions/jquery/jquery.min.js',
'resources/dist/assets/extensions/apexcharts/apexcharts.min.js',
'resources/dist/assets/extensions/sweetalert2/sweetalert2.min.js',
'resources/dist/assets/static/js/pages/sweetalert2.js',
])

<script>
$(document).ready(function () {

    $('#table1').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: 0 }
        ],
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