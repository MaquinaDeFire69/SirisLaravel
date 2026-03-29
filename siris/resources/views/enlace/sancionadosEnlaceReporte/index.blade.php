@extends('layouts.mastere')

@section('title', 'Listado de Sancionados')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="text-center mb-4">Listado de Sancionados</h5>

        <div class="row mb-4 justify-content-center">
            <div class="col-md-4 d-flex align-items-center">
                <span class="me-2 fw-bold" style="font-size: 0.8rem;">EJERCICIO</span>
                <select class="form-select bg-light border-0" id="filtroEjercicio" style="width: 150px;">
                    <option value="2026">2026</option>
                    <option value="2025">2025</option>
                </select>
                <span class="ms-1">▼</span>
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <span class="me-2 fw-bold" style="font-size: 0.8rem;">PERIODO INFORMADO</span>
                <select class="form-select bg-light border-0" id="filtroPeriodo" style="width: 180px;">
                    <option value="ENERO">ENERO</option>
                    <option value="FEBRERO">FEBRERO</option>
                </select>
                <span class="ms-1">▼</span>
                <button class="btn ms-3 text-white" style="background-color: #a54844;">Buscar</button>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <span>Mostrar</span>
                <select class="form-select form-select-sm mx-2" id="mostrarRegistros" style="width: auto;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
                <span>Registros</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-2">Buscar:</span>
                <input type="text" id="inputBusqueda" class="form-control form-control-sm" placeholder="Escribe para filtrar..." style="width: 200px;">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover" id="tablaSancionados" style="font-size: 0.9rem; color: #555;">
                <thead style="border-bottom: 2px solid #dee2e6;">
                    <tr>
                        <th class="fw-bold">No.</th>
                        <th class="fw-bold">No. expediente</th>
                        <th class="fw-bold">Nombre completo</th>
                        <th class="fw-bold">Ente público</th>
                        <th class="fw-bold">Falta cometida</th>
                        <th class="fw-bold">Tipo sanciones</th>
                        <th class="fw-bold">Tipo sancionado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>ARMANDO PADILLA SANCHEZ</td>
                        <td>SABGOB</td>
                        <td>PECULADO</td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td>LAURA SANSORES PEÑA</td>
                        <td>SABGOB</td>
                        <td>NEPOTISMO</td>
                        <td>ECONÓMICA</td>
                        <td>PERSONA MORAL</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>JOSE LUIS CHAVEZ ZETINA</td>
                        <td>SABGOB</td>
                        <td>PECULADO</td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td>FERNANDA CAMACHO JACINTO</td>
                        <td>SABGOB</td>
                        <td>NEPOTISMO</td>
                        <td>ECONÓMICA</td>
                        <td>PERSONA MORAL</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>JAVIER ARTURO RANGEL AVELAR</td>
                        <td>SABGOB</td>
                        <td>PECULADO</td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td>ISAI MISAEL MAGAÑA TUZ</td>
                        <td>SESA</td>
                        <td>NEPOTISMO</td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-01/2026</a></td>
                        <td>MADOX QUE FAJARDO</td>
                        <td>SEDETUR</td>
                        <td>PECULADO</td>
                        <td>INHABILITACIÓN, ECONÓMICA</td>
                        <td>PERSONA FÍSICA</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><a href="#" class="text-decoration-none" style="color: #4f5fbd;">SP-02/2026</a></td>
                        <td>ARIEL RIVERO MOO</td>
                        <td>SESA</td>
                        <td>NEPOTISMO</td>
                        <td>ECONÓMICA</td>
                        <td>PERSONA MORAL</td>
                    </tr>
                    </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="mb-0 text-muted" id="infoRegistros" style="font-size: 0.85rem;">Mostrando registros filtrados</p>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputBusqueda').addEventListener('keyup', function() {
        let filtro = this.value.toLowerCase();
        let filas = document.querySelectorAll('#tablaSancionados tbody tr');

        filas.forEach(fila => {
            let textoFila = fila.innerText.toLowerCase();
            if (textoFila.includes(filtro)) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        });
    });
</script>
@endsection