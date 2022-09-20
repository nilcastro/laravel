<div class="sidebar" data-color="orange" data-background-color="white">

  <div class="logo">
    <a href="<?php echo e(route('solicitud')); ?>" class="text logo-normal ml-4">
      <?php echo e(__('Solicitud de Refrigerios')); ?>

    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item<?php echo e($activePage == 'Solicitud' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('solicitud')); ?>">
          <i class="material-icons">content_paste</i>
          <p><?php echo e(__('Solicitud de alimentación ')); ?></p>
        </a>
      </li>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_index')): ?>
      <li class="nav-item<?php echo e($activePage == 'Especial' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('especial')); ?>">
          <i class="material-icons">content_paste</i>
          <p><?php echo e(__('Solicitud de especial')); ?></p>
        </a>
      </li>

      <li class="nav-item<?php echo e($activePage == 'Autorizacion' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('autorizacion.index')); ?>">
          <i class="material-icons">
            done    
          </i>
          <p><?php echo e(__('Autorización ')); ?></p>
        </a>
      </li>
      <?php endif; ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_index')): ?>
      <a class="nav-link" href="#provee" data-toggle="collapse" aria-expanded="false">

        <p><?php echo e(__('proveedores y productos')); ?> <b class="caret"></b></p>
      </a>
      <div class="collapse show " id="provee" aria-expanded="false">
        <ul class="nav">
          <li class="nav-item<?php echo e($activePage == 'proveedores' ? ' active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('proveedores')); ?>">
              <i  class="material-icons">store</i>
              <p><?php echo e(__('Proveedores')); ?></p>
            </a>
          </li>
          <li class="nav-item<?php echo e($activePage == 'productos' ? ' active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('productos')); ?>">
              <i class="material-icons">view_list</i>
              <p><?php echo e(__('Productos')); ?></p>
            </a>
          </li>
        </ul>
      </div>


      <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">

        <p><?php echo e(__('Admin de Usuarios.')); ?>

          <b class="caret"></b>
        </p>
      </a>
      <?php endif; ?>
      <div class="collapse show" id="laravelExample" aria-expanded="true">
        <ul class="nav">
          <!-- <li class="nav-item<?php echo e($activePage == 'permissions' ? ' active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('permissions.index')); ?>">
              <i class="material-icons">add_task</i>
              <p><?php echo e(__('Permissions')); ?></p>
            </a>
          </li>
        
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_index')): ?>
          <li class="nav-item<?php echo e($activePage == 'roles' ? ' active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
            <i class="material-icons">people_alt</i>
              <p><?php echo e(__('Roles')); ?></p>
            </a>
          </li>
          <?php endif; ?> -->
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_index')): ?>
          <li class="nav-item<?php echo e($activePage == 'user' ? ' active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
            <i class="material-icons">person</i>
              <span class="sidebar-normal"><?php echo e(__('Usuarios')); ?> </span>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
      </li>
    </ul>
  </div>
</div><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>