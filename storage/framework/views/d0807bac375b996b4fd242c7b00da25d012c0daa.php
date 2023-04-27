
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('user.create')); ?>" class="form-horizontal">
                        <input type="hidden" name="_token" value="buWVsYdyYrX8mUAfzVYmiszDfd1b5HuSBL3zuIL1"> <input type="hidden" name="_method" value="put">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Change password</h4>
                                <p class="card-category">Password</p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-name">Nombre</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" input="" type="text" name="name" id="name" placeholder="Current Password" value="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">New Password</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="password" id="input-password" type="password" placeholder="New Password" value="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Confirm New Password</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Confirm New Password" value="" required="">
                                        </div>
                                    </div>
                                </div>  
                           
                            <div class="row">
                            <label class="col-sm-2 col-form-label" for="input-password-confirmation">Permisos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                .<table class="table ">
                                                    <tbody>
                                                        <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="role[]" value="<?php echo e($id); ?>">
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
                                <button type="submit" class="btn btn-primary">Change password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', ['activePage' => 'user', 'titlePage' => 'Nuevo rol'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/user/create.blade.php ENDPATH**/ ?>