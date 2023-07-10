@extends('layouts.auth-master')

@section('content')

<div style="background-color: black; padding: 10px;">
  <div class="text-end">
    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Inicia Sesión</a>
    <a href="{{ route('register.perform') }}" class="btn btn-warning">Regístrate</a>
    <a href="/home" class="btn btn-outline-light">Home</a>
  </div>
</div>

    <form method="post" action="{{ route('login.perform') }}" class="container w-25">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Ingresa Tu Correo</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Ingresa Tu Contraseña</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-50 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>
        
    </form>
@endsection