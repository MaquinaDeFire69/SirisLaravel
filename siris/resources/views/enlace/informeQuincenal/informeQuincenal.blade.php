@extends('layouts.enlace.master')

@section('title', 'Informe Quincenal')

@section('content')
<div class="page-content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('enlace.panel_informativo') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Informe Quincenal</li>
        </ol>
    </nav>

    <div id="contenedor-principal">
        <div class="row" id="bloques-estados">
            <div id="bloque-atrasado" class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden card-hover">
                    <div class="card-body p-0 d-flex flex-column text-center">
                        <div class="bg-danger p-4 text-white">
                            <i class="bi bi-clock-history" style="font-size: 2.5rem;"></i>
                            <h5 class="text-white mt-2 mb-0 fw-bold">Pendiente de Envío</h5>
                        </div>
                        <div id="contenido-atrasado" class="p-5 flex-grow-1 d-flex flex-column justify-content-center">
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Periodo correspondiente</p>
                            <h4 class="fw-bold text-dark mb-4">01 al 15 Febrero, 2026</h4>
                            <button id="btn-a" class="btn btn-danger btn-lg rounded-pill shadow-sm py-3 fw-bold btn-animate" 
                                    onclick="mostrarTablas('atrasado', '01 al 15 Feb 2026')">
                                <i class="bi bi-pencil-square me-2"></i> INICIAR REPORTE
                            </button>
                        </div>
                        <div id="a-vacio" class="p-5 d-none">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3 mb-0">No hay reportes pendientes</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bloque-vigente" class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden card-hover">
                    <div class="card-body p-0 d-flex flex-column text-center">
                        <div class="bg-primary p-4 text-white">
                            <i class="bi bi-calendar-check" style="font-size: 2.5rem;"></i>
                            <h5 class="text-white mt-2 mb-0 fw-bold">Periodo Vigente</h5>
                        </div>
                        <div id="contenido-vigente" class="p-5 flex-grow-1 d-flex flex-column justify-content-center">
                            <p class="text-muted mb-1 small text-uppercase fw-semibold">Próximo cierre</p>
                            <h4 class="fw-bold text-dark mb-4">16 al 28 Febrero, 2026</h4>
                            <button id="btn-v" class="btn btn-light-secondary disabled btn-lg rounded-pill py-3 fw-bold btn-animate" 
                                    onclick="mostrarTablas('vigente', '16 al 28 Feb 2026')">
                                <i class="bi bi-lock-fill me-2"></i> ESPERAR CIERRE
                            </button>
                        </div>
                        <div id="v-vacio" class="p-5 d-none">
                            <i class="bi bi-send-check text-primary" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3 mb-0">Reporte enviado con éxito</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="seccion-tablas" class="d-none animate__animated animate__fadeIn">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <div>
                    <h2 class="fw-bold text-dark mb-0">Detalle de Faltas</h2>
                    <p class="text-muted mb-0 small" id="periodo-tabla"></p>
                </div>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="location.reload()">
                    <i class="bi bi-arrow-left me-1"></i> Cancelar
                </button>
            </div>

            @php 
            $categorias = [
                ['titulo' => 'Servidores Públicos', 'color' => '#435ebe', 'icon' => 'person-badge'],
                ['titulo' => 'Personas Físicas', 'color' => '#25a6bb', 'icon' => 'person-vcard'],
                ['titulo' => 'Personas Morales', 'color' => '#1d9972', 'icon' => 'building']
            ]; 
            @endphp

            @foreach($categorias as $cat)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3 d-flex align-items-center">
                    <div class="icon-shape rounded-circle me-3 d-flex align-items-center justify-content-center" 
                         style="background-color: {{ $cat['color'] }}15; color: {{ $cat['color'] }}; width: 40px; height: 40px;">
                        <i class="bi bi-{{ $cat['icon'] }} fs-5"></i>
                    </div>
                    <h5 class="mb-0 fw-bold text-dark">{{ $cat['titulo'] }}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3 text-muted fw-bold small text-uppercase">Expediente</th>
                                    <th class="text-muted fw-bold small text-uppercase">Nombre Completo</th>
                                    <th class="text-muted fw-bold small text-uppercase">CURP/RFC</th>
                                    <th class="text-muted fw-bold small text-uppercase">Falta</th>
                                    <th class="text-end pe-4 text-muted fw-bold small text-uppercase">Sanción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark text-nowrap">PME-01/2026</td>
                                    <td class="text-dark">Juan Pérez López</td>
                                    <td><code class="text-primary bg-light px-2 py-1 rounded small">PELJ809858HRT</code></td>
                                    <td><span class="badge bg-light-danger text-danger rounded-pill fw-medium">Peculado</span></td>
                                    <td class="text-end pe-4 text-muted">Inhabilitación</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="text-center pb-5 mt-4">
                <div class="bg-dark text-white p-3 d-inline-block rounded-pill mb-4 px-4 shadow-sm">
                    <i class="bi bi-info-circle me-2"></i>
                    <span class="small fw-medium">Revisa la información antes de realizar el envío definitivo</span>
                </div>
                <br>
                <button class="btn btn-dark btn-lg px-5 rounded-pill shadow py-3 fw-bold btn-animate" onclick="enviarInforme()">
                    <i class="bi bi-send-check me-2"></i> Finalizar y Enviar Reporte
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos dentro del section para no romper el footer */
    .bg-light-primary { background-color: #f0f5ff; color: #435ebe; }
    .bg-light-danger { background-color: #fff5f5; color: #dc3545; }
    .text-dark { color: #1e293b !important; }
    
    .breadcrumb { background: transparent; padding: 0; margin-bottom: 1.5rem; font-size: 0.85rem; }
    .breadcrumb-item a { color: #64748b; text-decoration: none; }
    .breadcrumb-item.active { color: #435ebe; font-weight: 600; }

    .card { border-radius: 12px; transition: all 0.2s ease-in-out; border: 1px solid #f1f5f9; }
    .card-hover:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important; }
    
    .table thead th { 
        background-color: #f8fafc; 
        border-bottom: 1px solid #e2e8f0; 
        font-size: 0.7rem; 
        letter-spacing: 0.05em; 
        color: #64748b;
    }
    
    .btn-animate { transition: all 0.2s; }
    .btn-animate:hover:not(:disabled) { transform: scale(1.02); filter: brightness(1.1); }
    
    .icon-shape i { display: inline-flex; align-items: center; justify-content: center; line-height: 0; }
</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let informeActual = '';
    let periodoTexto = '';

    function mostrarTablas(tipo, periodo) {
        informeActual = tipo;
        periodoTexto = periodo;
        document.getElementById('periodo-tabla').innerText = "Capturando datos del: " + periodo;
        
        document.getElementById('bloques-estados').classList.add('d-none');
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
        document.getElementById('bloques-estados').classList.remove('d-none');

        if (informeActual === 'atrasado') {
            document.getElementById('contenido-atrasado').classList.add('d-none');
            document.getElementById('a-vacio').classList.remove('d-none');
            
            let btnV = document.getElementById('btn-v');
            if(btnV) {
                btnV.classList.remove('btn-light-secondary', 'disabled');
                btnV.classList.add('btn-primary', 'shadow-sm');
                btnV.innerHTML = '<i class="bi bi-pencil-square me-2"></i> INICIAR REPORTE';
            }
        } else {
            document.getElementById('contenido-vigente').classList.add('d-none');
            document.getElementById('v-vacio').classList.remove('d-none');
        }
    }
</script>
@endsection