
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Reportes de solicitudes</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body card-body-primary">
                            <a class="btn btn-info" href="<?php echo e(route('reporte')); ?>">Generar reporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/main/eventos.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', ['activePage' => 'reportess', 'titlePage' => __('Reportes de solicitudes')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/autorizacion/repoorte.blade.php ENDPATH**/ ?>