<div class="sidebar" data-color="orange" data-background-color="white">

  <div class="logo">
    <a href="{{ route('solicitud') }}" class="text logo-normal ml-4">
      {{ __('Solicitud de Refrigerios') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item{{ $activePage == 'Solicitud' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('solicitud') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Solicitud de alimentación ') }}</p>
        </a>
      </li>
      @can('role_index')
      <li class="nav-item{{ $activePage == 'Especial' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('especial') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Solicitud de especial') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'Autorizacion' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('autorizacion.index') }}">
          <i class="material-icons">
            done    
          </i>
          <p>{{ __('Autorización ') }}</p>
        </a>
      </li>
      @endcan
      @can('user_index')
      <a class="nav-link" href="#provee" data-toggle="collapse" aria-expanded="false">

        <p>{{ __('proveedores y productos') }} <b class="caret"></b></p>
      </a>
      <div class="collapse show " id="provee" aria-expanded="false">
        <ul class="nav">
          <li class="nav-item{{ $activePage == 'proveedores' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('proveedores') }}">
              <i  class="material-icons">store</i>
              <p>{{ __('Proveedores') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('productos') }}">
              <i class="material-icons">view_list</i>
              <p>{{ __('Productos') }}</p>
            </a>
          </li>
        </ul>
      </div>


      <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">

        <p>{{ __('Admin de Usuarios.') }}
          <b class="caret"></b>
        </p>
      </a>
      @endcan
      <div class="collapse show" id="laravelExample" aria-expanded="true">
        <ul class="nav">
          <!-- <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('permissions.index') }}">
              <i class="material-icons">add_task</i>
              <p>{{ __('Permissions') }}</p>
            </a>
          </li>
        
          @can('user_index')
          <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="material-icons">people_alt</i>
              <p>{{ __('Roles') }}</p>
            </a>
          </li>
          @endcan -->
          @can('user_index')
          <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
            <i class="material-icons">person</i>
              <span class="sidebar-normal">{{ __('Usuarios') }} </span>
            </a>
          </li>
          @endcan
        </ul>
      </div>
      </li>
    </ul>
  </div>
</div>