

<?php $__env->startSection('title', 'Consultar Informes'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/src/assets/scss/iconly.scss']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">

    
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="fw-bold" style="color: #1a1a1a;">Consultar informes</h2>
        </div>
    </div>

   
    <form method="GET" action="<?php echo e(url()->current()); ?>" class="row mb-4 justify-content-center align-items-end">
        
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">EJERCICIO</label>
                <select name="ejercicio" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="2026" <?php echo e(request('ejercicio') == '2026' ? 'selected' : ''); ?>>2026</option>
                    <option value="2025" <?php echo e(request('ejercicio') == '2025' ? 'selected' : ''); ?>>2025</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex align-items-center">
                <label class="form-label text-uppercase text-muted fw-bold small me-3 mb-0">PERIODO INFORMADO</label>
                <select name="periodo" class="form-select bg-light text-center" style="width: 150px;">
                    <option value="">Todos</option>
                    <option value="ENERO" <?php echo e(request('periodo') == 'ENERO' ? 'selected' : ''); ?>>ENERO</option>
                    <option value="FEBRERO" <?php echo e(request('periodo') == 'FEBRERO' ? 'selected' : ''); ?>>FEBRERO</option>
                </select>
            </div>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-danger text-white px-4" style="background-color: #a52a2a; border-color: #a52a2a;">
                Buscar
            </button>
        </div>

    </form>

    
    <div class="card shadow-sm border-0">
        
        
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h6 class="mb-0 fw-bold text-dark">Listado de informes quincenales</h6>
            <div style="width: 250px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Search">
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle mb-0">
                    
                    
                    <thead class="text-white">
                        <tr>
                            <th class="py-3">No. reporte <i class="bi bi-filter"></i></th>
                            <th class="py-3">Periodo informe</th>
                            <th class="py-3">Fecha de envío</th>
                            <th class="py-3">Estatus</th>
                            <th class="py-3">Accion</th>
                        </tr>
                    </thead>

                    
                    <tbody>
                        <?php $__currentLoopData = $informes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-muted"><?php echo e($informe['no']); ?></td>
                            <td><?php echo e($informe['periodo']); ?></td>
                            <td><?php echo e($informe['fecha']); ?></td>
                            <td>
                                <?php if($informe['estatus'] == 'Normal'): ?>
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 border border-primary border-opacity-25 rounded-1">Normal</span>
                                <?php else: ?>
                                    <span class="badge bg-danger text-white px-3 py-2 rounded-1">Extemporaneo</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-sm <?php echo e($informe['estatus'] == 'Normal' ? 'btn-primary' : 'btn-secondary'); ?> rounded-1" <?php echo e($informe['estatus'] == 'Extemporaneo' ? 'disabled' : ''); ?>>
                                    Descargar acuse
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php for($i = 0; $i < 4; $i++): ?>
                        <tr>
                            <td class="text-muted">***</td>
                            <td class="text-muted">***</td>
                            <td class="text-muted">***</td>
                            <td><span class="badge bg-light text-muted px-3 py-2">***</span></td>
                            <td></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3 border-top">
            <div>
                <span class="text-muted small me-2">Items per page</span>
                <select class="form-select form-select-sm d-inline-block w-auto text-muted">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            
            <div class="d-flex align-items-center">
                <span class="text-muted small me-3">1 - 10 of 209</span>
                <button class="btn btn-sm btn-light text-muted me-1 border"><i class="bi bi-chevron-left"></i></button>
                <button class="btn btn-sm btn-light text-muted border"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\SirisLaravel-main\siris\resources\views/enlace/consultarInformes/consultar_informes.blade.php ENDPATH**/ ?>