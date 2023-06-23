@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}" class="container w-25">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('https://cdn-icons-png.flaticon.com/512/3201/3201052.png') !!}" alt="" width="90" height="90">
        
        <h1 class="h3 mb-3 fw-normal">Registro de Usuarios</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Juanito" required="required" autofocus>
            <label for="floatingEmail">Nombre</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Alias</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="direccion" required="required" autofocus>
            <label for="floatingAddress">Direccion</label>
            @if ($errors->has('direccion'))
                <span class="text-danger text-left">{{ $errors->first('direccion') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="codigopostal" value="{{ old('codigopostal') }}" placeholder="codigopostal" required="required" autofocus>
            <label for="floatingPostalCode">Codigo Postal</label>
            @if ($errors->has('codigopostal'))
                <span class="text-danger text-left">{{ $errors->first('codigopostal') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="telefono" required="required" autofocus>
            <label for="floatingPhone">Telefono</label>
            @if ($errors->has('telefono'))
                <span class="text-danger text-left">{{ $errors->first('telefono') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password" required="required">
            <label for="floatingPassword">Contraseña</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirmar Contraseña</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
        
    </form>
@endsection