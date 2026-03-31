@extends('layouts.admin.master')

@section('title', 'Configuración de Usuarios')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3>Listado de usuarios</h3>
            <p class="text-subtitle text-muted">Registro de personal administrativo y de enlace.</p>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('panel-informativo') }}">Configuración</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="text-center mb-3">Listado de usuarios</h5>

            <div class="d-flex justify-content-between align-items-center mb-2">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalNuevo">
                    <i class="bi bi-person-plus"></i> Nuevo Usuario
                </button>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <div>
                    Mostrar 
                    <select class="form-select d-inline-block" style="width: 80px;">
                        <option>10</option>
                        <option>25</option>
                    </select>
                    Registros
                </div>
                <div>
                    Buscar:
                    <input type="text" id="inputBusqueda" class="form-control d-inline-block" style="width: 200px;">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Usuario</th>
                            <th>Ente Público</th>
                            <th>Correo Electrónico</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyUsuarios">
                        </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-3 align-items-center">
                <small id="infoRegistros" class="text-muted">
                    </small>

                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-primary pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNuevo" tabindex="-1">
    <div class="modal-dialog modal-lg text-start">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Registrar nuevo usuario:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formNuevo">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="fw-bold">* Nombre Completo del Usuario:</label>
                            <input type="text" id="nuevoNombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="fw-bold">* Ente Público del Usuario:</label>
                            <select id="nuevoEnte" class="form-select" required>
                                <option value="" selected disabled>Seleccione un ente público...</option>
                                <option value="SABGOB">SABGOB</option>
                                <option value="SESAEQROO">SESAEQROO</option>
                                <option value="SEDE">SEDE</option>
                                <option value="SEDETUR">SEDETUR</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">* Correo Electrónico:</label>
                            <input type="email" id="nuevoCorreo" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">* Contraseña:</label>
                            <input type="password" id="nuevoPass" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">* Tipo de Usuario:</label>
                            <select id="nuevoTipo" class="form-select" required>
                                <option>ADMINISTRADOR</option>
                                <option>ENLACE</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">* Estatus:</label>
                            <select id="nuevoEstatus" class="form-select">
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" onclick="crearUsuario()" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Registrar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog modal-lg text-start">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Actualizar datos del usuario:</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formEditar">
                    <input type="hidden" id="editId">
                    <div class="mb-3">
                        <label class="fw-bold">* Nombre Completo:</label>
                        <input type="text" id="editNombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">* Ente Público:</label>
                        <select id="editEnte" class="form-select">
                            <option value="SABGOB">SABGOB</option>
                            <option value="SESAEQROO">SESAEQROO</option>
                            <option value="SEDE">SEDE</option>
                            <option value="SEDETUR">SEDETUR</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="fw-bold">Correo:</label>
                            <input type="email" id="editCorreo" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Tipo:</label>
                            <select id="editTipo" class="form-select">
                                <option>ADMINISTRADOR</option>
                                <option>ENLACE</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Estatus:</label>
                            <select id="editEstatus" class="form-select">
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" onclick="actualizarUsuario()" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let usuarios = [
        { id: 1, nombre: 'ADMINISTRADOR DEL SISTEMA', ente: 'SESAEQROO', correo: 'admin@sesaeqroo.qroo.gob.mx', tipo: 'ADMINISTRADOR', estatus: 'ACTIVO' },
        { id: 2, nombre: 'JOSÉ PÉREZ LÓPEZ', ente: 'SABGOB', correo: 'jperez@sabgob.qroo.gob.mx', tipo: 'ENLACE', estatus: 'ACTIVO' },
        { id: 3, nombre: 'LUIS ACEVEDO CRUZ', ente: 'SEDETUR', correo: 'lacevedo@sedetur.qroo.gob.mx', tipo: 'ENLACE', estatus: 'INACTIVO' }
    ];

    function renderTabla() {
        const tbody = document.getElementById('tbodyUsuarios');
        tbody.innerHTML = '';
        usuarios.forEach((user, index) => {
            // Estatus: ACTIVO -> Verde, INACTIVO -> Rojo
            const badgeClass = user.estatus === 'ACTIVO' ? 'bg-success' : 'bg-danger';
            
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${user.nombre}</td>
                    <td class="fw-bold">${user.ente}</td> <td>${user.correo}</td>
                    <td>${user.tipo}</td>
                    <td><span class="badge ${badgeClass}">${user.estatus}</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="prepararEdicion(${user.id})">
                            <i class="bi bi-pencil-square"></i> Actualizar
                        </button>
                    </td>
                </tr>
            `;
        });
        
        // Texto de registros dinámico
        document.getElementById('infoRegistros').innerText = `Mostrando registros del 1 al ${usuarios.length} de un total de ${usuarios.length}`;
    }

    function crearUsuario() {
        const nombre = document.getElementById('nuevoNombre').value;
        const ente = document.getElementById('nuevoEnte').value;
        const correo = document.getElementById('nuevoCorreo').value;
        const tipo = document.getElementById('nuevoTipo').value;
        const estatus = document.getElementById('nuevoEstatus').value;

        if(!nombre || !ente || !correo) return Swal.fire('Atención', 'Faltan campos obligatorios', 'warning');

        usuarios.push({ id: Date.now(), nombre, ente, correo, tipo, estatus });
        bootstrap.Modal.getInstance(document.getElementById('modalNuevo')).hide();
        document.getElementById('formNuevo').reset();
        renderTabla();
        Swal.fire('Éxito', 'Usuario registrado correctamente', 'success');
    }

    function prepararEdicion(id) {
        const user = usuarios.find(u => u.id === id);
        document.getElementById('editId').value = user.id;
        document.getElementById('editNombre').value = user.nombre;
        document.getElementById('editEnte').value = user.ente;
        document.getElementById('editCorreo').value = user.correo;
        document.getElementById('editTipo').value = user.tipo;
        document.getElementById('editEstatus').value = user.estatus;
        new bootstrap.Modal(document.getElementById('modalEditar')).show();
    }

    function actualizarUsuario() {
        const id = parseInt(document.getElementById('editId').value);
        const index = usuarios.findIndex(u => u.id === id);
        
        usuarios[index] = {
            id,
            nombre: document.getElementById('editNombre').value,
            ente: document.getElementById('editEnte').value,
            correo: document.getElementById('editCorreo').value,
            tipo: document.getElementById('editTipo').value,
            estatus: document.getElementById('editEstatus').value
        };
        
        bootstrap.Modal.getInstance(document.getElementById('modalEditar')).hide();
        renderTabla();
        Swal.fire('¡Listo!', 'Datos actualizados con éxito', 'success');
    }

    document.addEventListener('DOMContentLoaded', renderTabla);
</script>
@endsection