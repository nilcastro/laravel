<div class="sidebar" data-color="orange" data-background-color="white">

  <div class="logo">
    <a href="{{ route('solicitud') }}" class="text logo-normal">
      {{ __('Solicitud de Refrigerios') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <!-- <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Inicio') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'solicitud' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('solicitud') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Solicitud de alimentación ') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'autorizacion' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedores') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Autorización ') }}</p>
        </a>
      </li>
        <a class="nav-link" data-toggle="collapse" href="#provee" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
          <p>{{ __('proveedores y productos') }} <b class="caret"></b></p>
        </a>
      <div class="collapse show " id="provee" aria-expanded="false">
        <ul class="nav">
          <li class="nav-item{{ $activePage == 'proveedores' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('proveedores') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Proveedores') }}</p>
            </a>
          </li>
          <li class="nav-item{{ $activePage == 'productos' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('productos') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Productos') }}</p>
            </a>
          </li>
        </ul>
      </div>
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
          <p>{{ __('Admin de Usuarios.') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample" aria-expanded="true">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('permissions.index') }}">
                <i class="material-icons">library_books</i>
                <p>{{ __('Permissions') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="material-icons">library_books</i>
                <p>{{ __('Roles') }}</p>
              </a>
            </li>
          </ul>
        </div>
        <!-- <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div> -->
      </li>


      <!--  <li class="">
        <a class="nav-link" href="#">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>-->

    </ul>
  </div>
</div>