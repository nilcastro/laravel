
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('roles.store')); ?>" method="post" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Rol </h4>
                            <p class="card-category">Ingresar datos </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-12 col-fomr-label"> Nombre del rol </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile">
                                            .<table class="table ">
                                                <tbody>
                                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                                            value="<?php echo e($id); ?>" >
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                        </td>
                                                        <td>
                                                            <?php echo e($permission); ?>

                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Nuevo rol'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/roles/create.blade.php ENDPATH**/ ?>