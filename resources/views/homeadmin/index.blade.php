@extends('layouts.app-admin')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        @if (!(auth()->user()->email_verified_at))
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Pendiente verificación de correo</h4>
                        <p class="card-text">Primero debes verificar tu correo electrónico, revisa tu bandeja de entrada</p>
                        <p class="card-text">Puedes generar otro con el botón de abajo</p>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reenviar</button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                        <img src="https://cdn.icon-icons.com/icons2/491/PNG/512/email-timeout_48095.png" alt="Icono de correo electrónico" width="150px">
                    </div>
                </div>
            </div>
        @else
        <h1>Inicio en modo Administrador</h1>
        <div class="container">
                <div class="alert alert-success mt-1">
                    <h4 class="alert-heading">¡Correo electrónico verificado!</h4>
                </div>
            </div>
        <p class="lead">Bienvenido administrador a Laravel {{auth()->user()->name}}, Estás Autenticado.</p>
        @endif
        @endauth

        @guest
        <h1>Solo pueden acceder las personas con rol de administrador</h1>
        <p class="lead">Para poder ingresar a la pagina primero Autenticate.</p>
        @endguest
    </div>
@endsection
