


<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/src/assets/scss/iconly.scss']); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <!-- Definir titulo y ruta-->
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>Entes públicos proveedores de información</h3>
                <p class="text-subtitle text-muted">El presente apartado visualiza la información del estatus de cumplimiento de un ente público proveedor de información</p>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Informe quincenal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Entes públicos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Fin titulo y ruta-->

    <!-- Basic choices start -->
    <section class="basic-choices">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="card">
                   <!-- <div class="card-header">
                        <h4 class="card-title">Choices</h4>
                    </div> -->
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Proveedor de información</h6>
                                    <div class="form-group">
                                        <select class="choices form-select">
                                            <option value="">Seleccionar ente público</option>
                                            <option value="sesaeqroo">Secretaria Ejecutiva del Sistema Anticorrupción del Estado de Quintana Roo</option>
                                            <option value="teqroo">Tribunal Electoral de Quintana Roo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic choices end -->

    
    <div class="row justify-content-center">
        <?php
            $stats = [
                ['color' => 'purple', 'icon' => 'iconly-boldSend', 'label' => 'Efectividad de cumplimiento', 'value' => '50%'],
                ['color' => 'green', 'icon' => 'iconly-boldDocument', 'label' => 'Informes reportados en tiempo', 'value' => '1'],
                ['color' => 'red', 'icon' => 'iconly-boldDocument', 'label' => 'Informes reportados en extemporáneo', 'value' => '1'],
            ];
        ?>

        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card" >
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon <?php echo e($stat['color']); ?> mb-2">
                                <i class="<?php echo e($stat['icon']); ?>"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold"><?php echo e($stat['label']); ?></h6>
                            <h6 class="font-extrabold mb-0"><?php echo e($stat['value']); ?></h6>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>    
             
    <!-- Basic Vertical form layout section start -->
    <!--<section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Form with Icons</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">First Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Input with icon left" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Email</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Email"
                                                        id="email-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Mobile</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Mobile"
                                                        id="mobile-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Password"
                                                        id="password-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class='form-check'>
                                                <div class="checkbox mt-2">
                                                    <input type="checkbox" id="remember-me-v" class='form-check-input'
                                                        checked>
                                                    <label for="remember-me-v">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- // Basic Vertical form layout section end -->

    <!-- Minimal jQuery Datatable end -->
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Listado de informes quincenales reportados en el periodo
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Periodo del informe</th>
                                <th>Registros reportados</th>
                                <th>Fecha envió reporte</th>
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
                                <td>
                                    <span class="badge bg-success">Normal</span>
                                </td>
                                <td>
                                    <div class="buttons">
                                        <a href="#" class="btn btn-primary rounded-pill">Descargar acuse</a>                                    
                                    </div>    
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Enero 16 al 31 2026</td>
                                <td>3</td>
                                <td>2026-02-03</td>
                                <td>
                                    <span class="badge bg-warning">Extemporanea</span>
                                </td>
                                <td>
                                    <div class="buttons">
                                        <a href="#" class="btn btn-primary rounded-pill">Descargar acuse</a>                                    
                                    </div>                                     
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
  


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\siris2\resources\views/informes/entepublico.blade.php ENDPATH**/ ?>