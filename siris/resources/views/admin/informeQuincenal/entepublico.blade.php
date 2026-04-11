@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('styles')
@vite(['resources/src/assets/scss/iconly.scss'])

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
<div class="page-heading">

    <div class="page-title">
        <h3>Entes públicos proveedores de información</h3>
        <p class="text-subtitle text-muted">
            El presente apartado visualiza la información del estatus de cumplimiento de un ente público proveedor de información
        </p>
    </div>

    <!-- FILTROS -->
    <section class="basic-choices">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <!-- AÑO Y MES -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6>*Seleccione el año</h6>
                                    <div class="form-group">
                                        <select class="form-select text-dark fw-bold">
                                            <option value="">Seleccionar año</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h6>* Seleccione el mes</h6>
                                    <div class="form-group">
                                        <select class="form-select text-dark fw-bold">
                                            <option value="">Seleccionar mes</option>
                                            <option>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- PROVEEDOR -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h6>* Proveedor de información</h6>
                                    <div class="form-group">
                                        <select class="form-select text-dark fw-bold">
                                            <option value="">Seleccionar ente público</option>
                                            <option>Secretaria Ejecutiva del Sistema Anticorrupción del Estado de Quintana Roo</option>
                                            <option>Tribunal Electoral de Quintana Roo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- BOTONES -->
                            
                            <div class="row">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary me-2">
                                       <i class="bi bi-check-circle me-2"></i>Generar informe quincenal
                                    </button>

                                    <button type="button" onclick="limpiarFiltros()" class="btn btn-outline-primary me-2">
                                       <i class="bi bi-eraser me-2"></i>Limpiar filtros de búsqueda
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARDS -->
    <div class="row mt-4">

        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-danger border-4">
                <div class="card-body text-center">
                    <p class="fw-bold small">Efectividad de cumplimiento</p>
                    <h1 class="display-3 fw-bold text-danger mb-0">50%</h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-info border-4">
                <div class="card-body text-center">
                    <p class="fw-bold small">Informes reportados en tiempo</p>
                    <h1 class="display-3 fw-bold text-info mb-0">1</h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-start border-primary border-4">
                <div class="card-body text-center">
                    <p class="fw-bold small">Informes reportados en extemporáneo</p>
                    <h1 class="display-3 fw-bold text-primary mb-0">1</h1>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLA -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center mb-3">Listado de informes quincenales reportados en el periodo</h5>
            </div>

            <div class="card-body">

                <table id="tablaInformes" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Periodo del informe</th>
                            <th>Registros reportados</th>
                            <th>Fecha envío reporte</th>
                            <th>Estatus</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Enero 01 al 15 2026</td>
                            <td>3</td>
                            <td>2026-01-18</td>
                            <td><span class="badge bg-success">Normal</span></td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="bi bi-download"></i> Descargar acuse
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Enero 16 al 31 2026</td>
                            <td>3</td>
                            <td>2026-02-03</td>
                            <td><span class="badge bg-warning">Extemporáneo</span></td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="bi bi-download"></i> Descargar acuse
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- BOTON PDF -->
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-pdf"></i>
                        Exportar a PDF la información del Periodo
                    </a>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection

@section('scripts')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#tablaInformes').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5,10,25,50],
        language: {
            lengthMenu: "_MENU_ registros por página",
            search: "Buscar:",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
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