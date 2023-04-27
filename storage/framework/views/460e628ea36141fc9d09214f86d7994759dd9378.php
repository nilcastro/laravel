
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="<?php echo e(route('user.update', $user->id)); ?>"  class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Editar usuarios</h4>
                                <p class="card-category">Asignar rol</p>
                            </div>
                         
                            <div class="card-body "> 
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $use): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-name">Nombre</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control"  type="text" name="name" id="name"  value="<?php echo e($user->name); ?> <?php echo e($user->apellidos); ?>" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">ID</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="username" id="username" type="text"  value="<?php echo e($user->username); ?>" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">Correo eletronico</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="email" id="email" type="text"  value="<?php echo e($user->email); ?>" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">Cargo</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="cargo" id="cargo" type="text" placeholder="New Password" value="<?php echo e($user->cargo); ?>" required="">
                                        </div>
                                    </div>
                                </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                        <div class="row">
                            <label class="col-sm-2 col-form-label" for="input-password-confirmation">Permisos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                <table class="table ">
                                                    <tbody>
                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="role[]" 
                                                                        value="<?php echo e($id); ?>" <?php echo e($user->roles->contains($id) ? 'checked' : ''); ?>>
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo e($rol); ?>

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
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', ['activePage' => 'user', 'titlePage' => 'Nuevo rol'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/user/edit.blade.php ENDPATH**/ ?>