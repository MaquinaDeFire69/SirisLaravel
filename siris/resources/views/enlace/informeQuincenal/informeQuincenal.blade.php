@extends('layouts.enlace.master')
@section('title', 'Informe Quincenal')

@section('content')
<div class="page-heading d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark fw-bold">Informe Quincenal</h3>
    <span class="badge bg-light-primary text-primary px-3 py-2">Ejercicio 2026</span>
</div>

<div class="page-content">
    <div id="contenedor-principal">
        <div class="row">
            <div id="bloque-atrasado" class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <div class="card-body p-0 d-flex flex-column text-center">
                        <div class="bg-danger p-4 text-white">
                            <i class="bi bi-clock-history" style="font-size: 3rem;"></i>
                            <h5 class="text-white mt-2 mb-0 fw-bold">Pendiente de Envío</h5>
                        </div>
                        <div id="contenido-atrasado" class="p-5 flex-grow-1 d-flex flex-column justify-content-center">
                            <p class="text-muted mb-1">Periodo correspondiente:</p>
                            <h4 class="fw-bold text-dark mb-4">01 al 15 Febrero, 2026</h4>
                            <button id="btn-a" class="btn btn-danger btn-lg rounded-pill w-100 shadow-sm py-3 fw-bold" 
                                    onclick="mostrarTablas('atrasado', '01 al 15 Feb 2026')">
                                <i class="bi bi-pencil-square me-2"></i> INICIAR REPORTE
                            </button>
                        </div>
                        <div id="a-vacio" class="p-5 d-none">
                            <i class="bi bi-check-all text-success" style="font-size: 3.5rem;"></i>
                            <p class="text-muted fst-italic mt-2 fs-5">No hay reportes pendientes</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bloque-vigente" class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
                    <div class="card-body p-0 d-flex flex-column text-center">
                        <div class="bg-primary p-4 text-white">
                            <i class="bi bi-calendar-check" style="font-size: 3rem;"></i>
                            <h5 class="text-white mt-2 mb-0 fw-bold">Periodo Vigente</h5>
                        </div>
                        <div id="contenido-vigente" class="p-5 flex-grow-1 d-flex flex-column justify-content-center">
                            <p class="text-muted mb-1">Próximo cierre:</p>
                            <h4 class="fw-bold text-dark mb-4">16 al 28 Febrero, 2026</h4>
                            <button id="btn-v" class="btn btn-secondary disabled btn-lg rounded-pill w-100 py-3 fw-bold" 
                                    onclick="mostrarTablas('vigente', '16 al 28 Feb 2026')">
                                <i class="bi bi-lock-fill me-2"></i> ESPERAR CIERRE
                            </button>
                        </div>
                        <div id="v-vacio" class="p-5 d-none">
                            <i class="bi bi-send-check text-primary" style="font-size: 3.5rem;"></i>
                            <p class="text-muted fst-italic mt-2 fs-5">Reporte enviado con éxito</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="seccion-tablas" class="d-none animate_animated animate_fadeInUp">
            <div class="d-flex justify-content-between align-items-end mb-4 border-bottom pb-3">
                <div>
                    <h2 class="fw-bold mb-0" style="color: #2d3748;">Detalle de Faltas</h2>
                    <p class="text-primary mb-0 fw-medium fs-5" id="periodo-tabla"></p>
                </div>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="location.reload()">
                    <i class="bi bi-arrow-left-circle me-1"></i> Cancelar y volver
                </button>
            </div>

            @php 
            $categorias = [
                ['titulo' => 'Servidores Públicos', 'color' => '#435ebe', 'icon' => 'person-badge-fill'],
                ['titulo' => 'Personas Físicas', 'color' => '#25a6bb', 'icon' => 'person-vcard-fill'],
                ['titulo' => 'Personas Morales', 'color' => '#1d9972', 'icon' => 'building-fill']
            ]; 
            @endphp

            @foreach($categorias as $cat)
            <div class="card border-0 shadow-sm mb-5" style="border-radius: 12px; border: 1px solid #e2e8f0 !important;">
                <div class="card-header bg-white border-0 py-3 d-flex align-items-center">
                    
                    {{-- CONTENEDOR DEL ICONO --}}
                    <div class="icon-shape rounded-3 me-3 d-flex align-items-center justify-content-center" 
                         style="background-color: {{ $cat['color'] }}15; color: {{ $cat['color'] }}; width: 45px; height: 45px;">
                        
                        {{-- AJUSTE ÓPTICO: Bajamos el icono 1.5px para compensar la caja de la fuente --}}
                        <i class="bi bi-{{ $cat['icon'] }} fs-4" style="transform: translateY(1.5px);"></i>
                        
                    </div>

                    <h5 class="mb-0 fw-bold" style="color: #2d3748;">{{ $cat['titulo'] }}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr style="background-color: #f8fafc;">
                                    <th class="ps-4 py-3 text-muted fw-bold small text-uppercase" style="width: 15%;">Expediente</th>
                                    <th class="text-muted fw-bold small text-uppercase">Nombre Completo</th>
                                    <th class="text-muted fw-bold small text-uppercase">CURP/RFC</th>
                                    <th class="text-muted fw-bold small text-uppercase">Falta Cometida</th>
                                    <th class="text-muted fw-bold small text-uppercase text-end pe-4">Tipo Sanción</th>
                                </tr>
                            </thead>
                            <tbody class="border-top-0">
                                <tr>
                                    <td class="ps-4 fw-bold text-dark">PME-01/2026</td>
                                    <td class="text-secondary">Juan Pérez López</td>
                                    <td><code class="text-primary bg-light px-2 py-1 rounded small">PELJ809858HRT</code></td>
                                    <td><span class="badge rounded-pill fw-medium" style="background-color: #fee2e2; color: #991b1b;">Peculado</span></td>
                                    <td class="text-end pe-4 text-secondary">Inhabilitación, Económica</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center pb-5 mt-4">
                <div class="bg-info p-2 d-inline-block rounded-pill mb-3">

                    <span class="text-white small px-3">Revisa la información antes de realizar el envío definitivo</span>
                </div>
                <br>
                <button class="btn btn-dark btn-lg px-5 rounded-pill shadow-lg py-3 fw-bold" onclick="enviarInforme()" style="background-color: #1a202c; min-width: 300px;">
                    <i class="bi bi-send-check-fill me-2"></i> Finalizar y Enviar Reporte
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let informeActual = '';
    let periodoTexto = '';

    function mostrarTablas(tipo, periodo) {
        informeActual = tipo;
        periodoTexto = periodo;
        document.getElementById('periodo-tabla').innerText = "Capturando: " + periodo;
        
        document.getElementById('bloque-vigente').classList.add('d-none');
        document.getElementById('bloque-atrasado').classList.add('d-none');
        document.getElementById('seccion-tablas').classList.remove('d-none');
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function enviarInforme() {
        Swal.fire({
            title: '¿Confirmar envío?',
            text: "Se enviará el informe correspondiente al periodo " + periodoTexto,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1a202c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, enviar ahora',
            cancelButtonText: 'Revisar datos',
            borderRadius: '15px',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: '¡Informe Enviado!',
                    text: 'Los datos se han procesado correctamente.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                    borderRadius: '15px'
                });
                procesarAceptar();
            }
        });
    }

    function procesarAceptar() {
        document.getElementById('seccion-tablas').classList.add('d-none');
        document.getElementById('bloque-vigente').classList.remove('d-none');
        document.getElementById('bloque-atrasado').classList.remove('d-none');

        if (informeActual === 'atrasado') {
            document.getElementById('contenido-atrasado').classList.add('d-none');
            document.getElementById('a-vacio').classList.remove('d-none');
            
            let btnV = document.getElementById('btn-v');
            if(btnV) {
                btnV.classList.remove('btn-secondary', 'disabled');
                btnV.classList.add('btn-primary', 'shadow');
                btnV.innerHTML = '<i class="bi bi-pencil-square me-2"></i> INICIAR REPORTE';
            }
        } else {
            document.getElementById('contenido-vigente').classList.add('d-none');
            document.getElementById('v-vacio').classList.remove('d-none');
        }
    }
</script>

<style>
    /* Clases de apoyo para limpieza visual */
    .bg-light-primary { background-color: #e8f0fe; color: #435ebe; }
    .table thead th { border-bottom: 1px solid #e2e8f0 !important; font-size: 0.75rem; letter-spacing: 0.5px; color: #64748b; }
    .table tbody tr:hover { background-color: #f8fafc !important; }
    code { font-family: 'Consolas', 'Monaco', monospace; font-size: 0.85rem; }
    .card { transition: all 0.3s ease; }
    .icon-shape { transition: all 0.3s ease; }
    .btn-dark:hover { background-color: #2d3748 !important; transform: translateY(-2px); }
</style>
@endsection