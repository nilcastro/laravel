
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Roles </h4>
                                <p class="card-category">roles registrados </p>
                            </div>
                            <div class="card-body ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-sm btn-facebook">Añadir permiso</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Guard</th>
                                                <th>Fecha de creación</th>
                                                <th>Permisos</th>
                                                <th class="text-rigth"></th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($rol->id); ?></td>
                                                    <td><?php echo e($rol->name); ?></td>
                                                    <td><?php echo e($rol->guard_name); ?></td>
                                                    <td><?php echo e($rol->created_at); ?></td>
                                                    <td>
                                                        <?php $__empty_1 = true; $__currentLoopData = $rol->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge badge-info"><?php echo e($permission->name); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <span class="badge badge-danger">No tiene permisos</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <a href="<?php echo e(route('roles.show',$rol->id)); ?>" class="btn btn-info">
                                                            <i class="material-icons">person</i></a>
                                                        <a href="<?php echo e(route('roles.edit',$rol->id)); ?>" class="btn btn-warning">
                                                            <i class="material-icons">edit</i></a>
                                                        <form action="<?php echo e(route('roles.destroy', $rol->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('seguro deseas eliminar este registro?')">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="btn btn-danger  btn-link btn-sm" onclick='swal({ title:"Eliminado", text: "registro no se vuelve a recuperar!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})'>  <i class="material-icons">close</i></button>
                                                            <!-- <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button> -->
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/roles/index.blade.php ENDPATH**/ ?>