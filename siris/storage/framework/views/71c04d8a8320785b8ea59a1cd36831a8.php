<?php $__env->startSection('title', 'Sancionados'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/src/assets/scss/iconly.scss']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">

        
        <!-- Definir titulo y ruta-->
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>Entes públicos sancionados</h3>
                <p class="text-subtitle text-muted">El presente apartado visualiza la información del estatus de sanción de un ente público</p>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Sancionados</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reportes</li>
                    </ol>
                </nav>
            </div>
        </div>

        
        <div class="card border mb-4">
            <div class="card-header bg-light fw-bold">
                Filtros de búsqueda
            </div>

            <div class="card-body">

                <div class="row mb-3">

                    
                    <div class="col-md-6">
                        <label class="fw-bold">Sancionados:</label>
                        <select class="form-select">
                            <option>Seleccione un ente público proveedor de información...</option>
                            <?php $__currentLoopData = $entes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($ente); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6">
                        <label class="fw-bold">Periodos informativos:</label>
                        <select class="form-select">
                            <option>Seleccione un periodo informativo...</option>
                            <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($periodo); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>

                
                <div class="row mb-3">
                    <div class="col-12">
                        <label class="fw-bold">Entes públicos proveedores</label>
                        <select class="form-select">
                            <option>Seleccione un ente público proveedor de información...</option>
                            <?php $__currentLoopData = $entes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($ente); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                
                <div class="text-center">
                    <button class="btn btn-outline-primary me-2">
                        <i class="bi bi-search"></i> Buscar sancionados
                    </button>

                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-eraser"></i> Limpiar filtros de búsqueda
                    </button>
                </div>

            </div>
        </div>

        
        <div class="card">
            <div class="card-header text-center fw-bold">
                Listado de sancionados
            </div>

            <div class="card-body">

                
                <div class="d-flex justify-content-between mb-3">

                    <div>
                        Mostrar
                        <select class="form-select d-inline w-auto mx-2">
                            <option>5</option>
                            <option>10</option>
                            <option>25</option>
                        </select>
                        Registros
                    </div>

                    <div>
                        Buscar
                        <input type="text" class="form-control d-inline w-auto">
                    </div>

                </div>

                
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>No.</th>
                                <th>No. expediente</th>
                                <th>Nombre completo</th>
                                <th>Ente público</th>
                                <th>Falta cometida</th>
                                <th>Tipo sanciones</th>
                                <th>Tipo sancionado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $sancionados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td class="text-primary"><?php echo e($s['expediente']); ?></td>
                                    <td><?php echo e($s['nombre']); ?></td>
                                    <td><?php echo e($s['ente']); ?></td>
                                    <td><?php echo e($s['falta']); ?></td>
                                    <td><?php echo e($s['sancion']); ?></td>
                                    <td><?php echo e($s['tipo']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="d-flex justify-content-between mt-3">

                    <div>
                        Mostrando registros del 1 al 5 de un total de 15
                    </div>

                    <div>
                        <button class="btn btn-sm btn-outline-secondary">Anterior</button>
                        <button class="btn btn-sm btn-warning">1</button>
                        <button class="btn btn-sm btn-outline-secondary">2</button>
                        <button class="btn btn-sm btn-outline-secondary">3</button>
                        <button class="btn btn-sm btn-outline-secondary">Siguiente</button>
                    </div>

                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\SirisLaravel-main\siris\resources\views/admin/sancionados/sancionados.blade.php ENDPATH**/ ?>