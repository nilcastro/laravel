
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                       <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">vista detallada de cada usuario</p>
                            </div>
                            <div class="card-body ">
                                <?php if(session('success')): ?>
                                <div class="alert alert-success" roller="success">
                                    <?php echo e(session('success')); ?>

                                </div>
                                <?php endif; ?>
                               <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-user">
                                            <div class="card-body">
                                               <table class="table table-bordered table-stried">
                                                   <tbody>
                                                       <tr>
                                                           <th>ID</th>
                                                           <td><?php echo e($user->id); ?></td>

                                                       </tr>
                                                       <tr>
                                                           <th>Name</th>
                                                           <td><?php echo e($user->name); ?></td>
                                                       </tr>
                                                       <tr>
                                                           <th>email</th>
                                                           <td><?php echo e($user->email); ?></td>
                                                       </tr>
                                                       <tr>
                                                           <th>Name</th>
                                                           <td><?php echo e($user->name); ?></td>
                                                       </tr>
                                                       <tr>
                                                           <th>Roles</th>
                                                           <td>
                                                           <?php $__empty_1 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>  
                                                                <span class="badge badge-info"><?php echo e($role->name); ?></span> 
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <span class="badge badge-info">Sin rol</span>
                                                            <?php endif; ?>
                                                        </td>
                                                       </tr>
                                                   </tbody>

                                               </table>
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
<?php echo $__env->make('layouts.main', ['activePage' => 'user', 'titlePage' => 'vista de usuarios'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/user/show.blade.php ENDPATH**/ ?>