<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/homeadmin" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>
      
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/homeadmin" class="nav-link px-2 text-primary">[Inicio Administrador]</a></li>
        <li><a href="/home" class="nav-link px-2 text-secondary">[Regresar Inicio]</a></li>
        <li><a href="/empleados" class="nav-link px-2 text-white">[Empleados]</a></li>
        <li><a href="/carreras" class="nav-link px-2 text-white">[Carreras]</a></li>
        <li><a href="/periodos" class="nav-link px-2 text-white">[Periodos]</a></li>
        <li><a href="/empleadocarrera" class="nav-link px-2 text-white">[Empleado/Carrera]</a></li>
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
