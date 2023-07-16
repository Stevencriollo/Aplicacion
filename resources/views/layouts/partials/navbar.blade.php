<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>
      
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/home" class="nav-link px-2 text-secondary">Inicio</a></li>
        <li><a href="/role" class="nav-link px-2 text-white">Roles</a></li>
        <li><a href="/user" class="nav-link px-2 text-white">Usuario</a></li>
        <li><a href="/clirols" class="nav-link px-2 text-white">[Administrar Rol de Usuarios]</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Contactanos</a></li>
        <li><a href="#" class="nav-link px-2 text-white">Mas información</a></li>
        @auth
        <!--El usuario tiene un registro en la tabla clirols donde el role es "Administrador" y el estado no es "DESACTIVADO"!-->
        @if(App\Models\Clirol::where('user_id', auth()->user()->id)->where('estado', '!=', 'DESACTIVADO')->whereHas('role', function ($query) {
        $query->where('rol', 'Administrador');
        })->exists())
          <li><a href="/homeadmin" class="nav-link px-2 text-primary">[Inicio Administrador]</a></li>
        @endif
        @endauth
      </ul>
<!-- 
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>
!-->
      @auth
        <div class="text-end px-2">
          <span class="text-white">{{ auth()->user()->name }}</span>
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Salir</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Inicia Sesion</a>
          <a href="{{ route('register.perform') }}" class="btn btn-warning">Registrate</a>
        </div>
      @endguest
    </div>
  </div>
</header>
