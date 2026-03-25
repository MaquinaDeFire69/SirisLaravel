

<?php $__env->startSection('title', 'Información del Expediente'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/src/assets/scss/iconly.scss']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">

    
    <div class="row">
        <div class="col-12 col-md-8 order-md-1 order-last">
            <h3 class="text-purple" style="color: #4a148c;">Información del expediente</h3>
        </div>
        <div class="col-12 col-md-4 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('sancionados.sancionados')); ?>">Sancionados</a></li>
                    <li class="breadcrumb-item text-warning fw-bold active" aria-current="page">Expediente</li>
                </ol>
            </nav>
        </div>
    </div>

    
    <div class="card border mb-4">
        
        <div class="card-header text-center fw-bold fs-5" style="color: #4a148c;">
            Información del expediente
        </div>

        <div class="card-body">

            
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Datos generales del sancionado 
                <span class="badge bg-danger ms-2" title="ID dinámico recibido de la ruta">ID BD: <?php echo e($id ?? 'N/A'); ?></span>
            </div>
            
            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Expediente:</strong> <?php echo e($datosExpediente['numero']); ?>

                </div>
                <div class="col-12 mb-2">
                    <strong>Nombre:</strong> <?php echo e($datosExpediente['nombre']); ?>

                </div>
                <div class="col-md-4 mb-2">
                    <strong>CURP:</strong> <?php echo e($datosExpediente['curp']); ?>

                </div>
                <div class="col-md-4 mb-2">
                    <strong>RFC:</strong> <?php echo e($datosExpediente['rfc']); ?>

                </div>
                <div class="col-md-4 mb-2">
                    <strong>Sexo:</strong> <?php echo e($datosExpediente['sexo']); ?>

                </div>
            </div>

            
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Información de la sanción
            </div>

            <div class="row mb-4 px-2">
                <div class="col-12 mb-2">
                    <strong>Institución que sanciona:</strong> <?php echo e($datosExpediente['institucion']); ?>

                </div>
                <div class="col-12 mb-3">
                    <strong>Falta Cometida:</strong> <?php echo e($datosExpediente['falta_cometida']); ?>

                </div>
                
                <div class="col-md-3 mb-3">
                    <strong>Normatividad:</strong> <?php echo e($datosExpediente['normatividad']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Artículo:</strong> <?php echo e($datosExpediente['articulo']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fracción:</strong> <?php echo e($datosExpediente['fraccion']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Falta:</strong> <?php echo e($datosExpediente['falta']); ?>

                </div>

                <div class="col-md-3 mb-3">
                    <strong>Fecha de Resolución:</strong> <?php echo e($datosExpediente['fecha_resolucion']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha de Notificación:</strong> <?php echo e($datosExpediente['fecha_notificacion']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Inicio Inhabilitación:</strong> <?php echo e($datosExpediente['fecha_inicio_inhab']); ?>

                </div>
                <div class="col-md-3 mb-3">
                    <strong>Fecha Fin Inhabilitación:</strong> <?php echo e($datosExpediente['fecha_fin_inhab']); ?>

                </div>

                <div class="col-md-4 mb-2">
                    <strong>Años de Inhabilitación:</strong> <?php echo e($datosExpediente['anios']); ?>

                </div>
                <div class="col-md-4 mb-2">
                    <strong>Meses de Inhabilitación:</strong> N/A
                </div>
                <div class="col-md-4 mb-2">
                    <strong>Días de Inhabilitación:</strong> N/A
                </div>
            </div>

            
            <div class="bg-secondary bg-opacity-25 text-dark p-2 mb-3 fw-bold">
                Sanciones aplicadas:
            </div>

            <div class="row px-2 mb-4">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Sanción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datosExpediente['sanciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="bg-secondary <?php echo e($index % 2 == 0 ? 'bg-opacity-10' : 'bg-opacity-25'); ?>"><?php echo e($sancion); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            <div class="text-center mt-5 mb-2">
                
                <a href="<?php echo e(route('sancionados.sancionados')); ?>" class="btn btn-outline-secondary me-3 fw-bold text-dark">
                    <i class="bi bi-arrow-left-circle" style="color: #4a148c;"></i> Regresar al listado de sancionados
                </a>
                <button class="btn btn-outline-secondary fw-bold text-dark">
                    <i class="bi bi-file-earmark-pdf" style="color: #4a148c;"></i> Exportar a PDF la información del expediente
                </button>
            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\SirisLaravel-main\siris\resources\views/admin/sancionados/info_expediente.blade.php ENDPATH**/ ?>