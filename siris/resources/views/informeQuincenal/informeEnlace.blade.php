@extends('layouts.master')

@section('sidebar')
    @include('layouts.sidebar_e')
@endsection

@section('content')
    <div class="page-heading">
        <h3 class="text-dark">Informe Quincenal</h3>
    </div>

    <div class="page-content text-dark">
        <div id="mensaje-exito" class="d-none text-center py-5">
            <div class="card shadow-lg p-5">
                <div class="card-body">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                    <h2 class="mt-4 fw-bold" style="color: #4b2e63;">El reporte se envió</h2>
                    <p class="text-muted fs-5" id="tipo-envio">"Temporal"</p>
                    <div class="bg-light d-inline-block p-4 rounded-3 my-3" style="background-color: #f8f9fa;">
                        <p class="mb-0 small text-muted">Periodo</p>
                        <h4 class="fw-bold mb-0" id="periodo-exito">01-15 Feb 2026</h4>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-lg mt-4 px-5" onclick="procesarAceptar()">Aceptar</button>
                </div>
            </div>
        </div>

        <div id="contenedor-principal">
            <div id="bloque-vigente" class="card shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 pb-0 text-center">
                    <h6 class="text-dark">Informe actual vigente</h6>
                </div>
                <div id="contenido-vigente" class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div class="bg-primary text-white p-3 rounded shadow-sm">
                        <h6 class="mb-0 text-white">16 al 28 Febrero del 2026</h6>
                    </div>
                    <button id="btn-v" class="btn btn-secondary disabled rounded-pill" onclick="mostrarTablas('vigente', '16 al 28 Feb 2026')">
                        Iniciar informe
                    </button>
                </div>
                <div id="v-vacio" class="card-body text-center py-4 d-none">
                    <h6 class="text-muted fst-italic">Sin reportes vigentes</h6>
                </div>
            </div>

            <div id="bloque-atrasado" class="card shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 pb-0 text-center">
                    <h6 class="text-dark">Informe(s) pendiente(s)</h6>
                </div>
                <div id="contenido-atrasado" class="card-body p-4 d-flex align-items-center justify-content-between border-start border-danger border-4 rounded">
                    <div class="bg-danger text-white p-3 rounded shadow-sm">
                        <p class="mb-0 small">Informe atrasado</p>
                        <h6 class="mb-0 text-white">01 al 15 Febrero del 2026</h6>
                    </div>
                    <button id="btn-a" class="btn btn-danger rounded-pill shadow" onclick="mostrarTablas('atrasado', '01 al 15 Feb 2026')">
                        Iniciar informe
                    </button>
                </div>
                <div id="a-vacio" class="card-body text-center py-4 d-none">
                    <h6 class="text-muted fst-italic">Sin reportes atrasados</h6>
                </div>
            </div>

            <div id="seccion-tablas" class="d-none">
                <hr class="my-5">
                <div class="text-center mb-4">
                    <h4 class="fw-bold" style="color: #4b2e63;">FALTAS ADMINISTRATIVAS</h4>
                    <span class="badge bg-info" id="periodo-tabla"></span>
                </div>
                
                @php $categorias = ['Servidores públicos', 'Personas Físicas', 'Personas Morales']; @endphp
                @foreach($categorias as $cat)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white py-2">
                        <h5 class="card-title text-white mb-0">{{ $cat }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="table-secondary text-center small">
                                    <tr>
                                        <th>Expediente</th>
                                        <th>Nombre Completo</th>
                                        <th>CURP/RFC</th>
                                        <th>Falta Cometida</th>
                                        <th>Tipo Sanción</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <tr>
                                        <td class="text-center">PME-001/2026</td>
                                        <td>Juan Perez Lopez</td>
                                        <td>PELJ809858HRT</td>
                                        <td>Peculado</td>
                                        <td>Inhabilitación</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="text-center mt-5 mb-5">
                    <button class="btn btn-success btn-lg px-5 shadow" onclick="enviarInforme()">
                        Enviar informe quincenal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let informeActual = '';

        function mostrarTablas(tipo, periodo) {
            informeActual = tipo;
            document.getElementById('periodo-tabla').innerText = "Periodo: " + periodo;
            document.getElementById('periodo-exito').innerText = periodo;
            
            document.getElementById('bloque-vigente').classList.add('d-none');
            document.getElementById('bloque-atrasado').classList.add('d-none');
            document.getElementById('seccion-tablas').classList.remove('d-none');
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function enviarInforme() {
            document.getElementById('seccion-tablas').classList.add('d-none');
            document.getElementById('mensaje-exito').classList.remove('d-none');
        }

        function procesarAceptar() {
            document.getElementById('mensaje-exito').classList.add('d-none');
            document.getElementById('bloque-vigente').classList.remove('d-none');
            document.getElementById('bloque-atrasado').classList.remove('d-none');

            if (informeActual === 'atrasado') {
                document.getElementById('contenido-atrasado').classList.add('d-none');
                document.getElementById('a-vacio').classList.remove('d-none');
                
                let btnV = document.getElementById('btn-v');
                if(btnV) {
                    btnV.classList.remove('btn-secondary', 'disabled');
                    btnV.classList.add('btn-info', 'text-white', 'shadow');
                }
            } else {
                document.getElementById('contenido-vigente').classList.add('d-none');
                document.getElementById('v-vacio').classList.remove('d-none');
            }
        }
    </script>
@endsection