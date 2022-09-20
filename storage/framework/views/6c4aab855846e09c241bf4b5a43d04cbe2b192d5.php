
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
                                    <!-- <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="<?php echo e(route('user.create')); ?>" class="btn btn-sm btn-facebook">Añadir permiso</a>
                                        </div>
                                    </div> -->
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <!-- <th>Fecha de creación</th> -->
                                                <th>Rol</th>
                                                <!-- <th>Permisos</th> -->
                                                <th class="text-rigth"></th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($user->username); ?></td>
                                                    <td><?php echo e($user->name); ?><?php echo e($user->apellidos); ?></td>
                                                    <!-- <td><?php echo e($user->created_at); ?></td> -->
                                                    <td>
                                                        <?php $__empty_1 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <span class="badge badge-info"><?php echo e($role->name); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                                            <span class="badge badge-info">sin rol</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php $__empty_1 = true; $__currentLoopData = $user->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge badge-info"><?php echo e($permission->name); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <span class="badge badge-danger">No tiene permisos</span>
                                                        <?php endif; ?>
                                                    </td> -->
                                                    <td class="td-actions text-right">
                                                        <a href="<?php echo e(route('user.show',$user->id)); ?>" class="btn btn-info">
                                                            <i class="material-icons">person</i></a>
                                                        <a href="<?php echo e(route('user.edit',$user->id)); ?>" class="btn btn-warning">
                                                            <i class="material-icons">edit</i></a>
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
<?php echo $__env->make('layouts.main', ['activePage' => 'user', 'titlePage' => 'Usuarios'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/user/index.blade.php ENDPATH**/ ?>