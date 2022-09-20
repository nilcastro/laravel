<?php $__env->startSection('content'); ?>
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-md-9 ml-auto mr-auto mb-3 text-center">

        </div>
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <?php if(Session::has('mensaje')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php echo e(Session::get('mensaje')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <div class="card card-login card-hidden ">
                    <div class="card-header card-header-gray text-center ">
                        <img src="<?php echo e(asset('img/LOGO-UPB-SIN-LIMITE.png')); ?>" class="mt-4" width="300px" height="120px" alt=""/>
                     
                       <!-- <div class="card-header card-header-primary mt-2 ">
                            <h4 ><?php echo e(__('Solicitud de alimentos y bebidas')); ?> </h4>
                        </div>
                  -->
                      
                         <!-- <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>  -->
                    </div>
                    <div class="card-body">
                        <h4 class="card-description text-center color-danger"><?php echo e(__('Ingreso solicitud de alimentos y bebidas ')); ?> </h4>
                        <div class="bmd-form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="<?php echo e(__('Usuario...')); ?>" value="<?php echo e(old('username')); ?>"autofocus required>
                            </div>
                            <?php if($errors->has('email')): ?>
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="bmd-form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?> mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(__('Password...')); ?>" required>
                            </div>
                            <?php if($errors->has('password')): ?>
                            <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember me')); ?>

                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div> -->
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-link btn-lg"><?php echo e(__('Login')); ?></button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-8">
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">

                            <a class="btn btn-link text-light" target="_blank" href="https://sso.upb.edu.co/accountrecoveryendpoint/recoverpassword.do?callback=https%3A%2F%2Fsso.upb.edu.co%3A443%2Fauthenticationendpoint%2Flogin.do%3FName%3DPreLoginRequestProcessor%26commonAuthCallerPath%3D%25252Fcas%25252Flogin%26forceAuth%3Dtrue%26passiveAuth%3Dfalse%26service%3Dhttps%253A%252F%252Fsigaa.upb.edu.co%253A443%252Fssomanager%252Fc%252FSSB%26tenantDomain%3Dcarbon.super%26sessionDataKey%3Dc18f700c-f652-4d8a-bcec-7ccb21badcb2%26relyingParty%3Dssb-banpdn%26type%3Dcas%26sp%3Dssb-banpdn%26isSaaSApp%3Dfalse%26authenticators%3DBasicAuthenticator%3ALOCAL">
                                Olvide mi Contraseña
                            </a>

                        </div>

                    </div>
                    <!-- <div class="col-6 text-right">
                        <a href="<?php echo e(route('register')); ?>" class="text-light">
                            <small><?php echo e(__('Create new account')); ?></small>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __(' ')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/auth/login.blade.php ENDPATH**/ ?>