
<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Sericio de solicitud de refrigerios</h4>
          </div>
          <br><br>
          <div class="row mb-4">
          <div class="col-5 ml-4">
            <a class="btn btn-info" href="<?php echo e(url('solicitud/create')); ?>">Crear nueva solicutd de refrigerios y bebidas</a>
          </div>
          <div class="col-5 mr-2">
            <a class="btn btn-success" href="<?php echo e(url('/solicitud/create')); ?>">Consultar proveedores de refrigerios y bebidas</a>

          </div>
          </div>
         
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de solicitudes</h4>
                        <p class="card-category"> todas las solicitudes </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                      <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Duración </th>
                                        <th>Lugar </th>
                                        <th>Proveedor</th>
                                        <th>Fecha evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $solicitud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td ><?php echo e($solicitu->id); ?></td>
                                        <td><?php echo e($solicitu->dia); ?></td>
                                        <td><?php echo e($solicitu->nombreauto); ?></td>
                                        <td><?php echo e($solicitu->nombresolici); ?></td>
                                        <td><?php echo e($solicitu->duracion); ?></td>
                                        <td><?php echo e($solicitu->lugaruno); ?></td>
                                        <td><?php echo e($solicitu->Nombreprove); ?></td>
                                        <td class="text-primary"><?php echo e($solicitu->fechain); ?></td>
                                        <td><?php echo e($solicitu->estado); ?></td>
                                        <td><a href="<?php echo e(route('autorizacion.edit',$solicitu->id)); ?>" class="btn btn-warning">Revisar </a></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                                                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  

      <?php $__env->stopSection(); ?>
     
<?php echo $__env->make('layouts.main', ['activePage' => 'Especial', 'titlePage' => __('Especial')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/especial/index.blade.php ENDPATH**/ ?>