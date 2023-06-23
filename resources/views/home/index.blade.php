@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Inicio</h1>
        <p class="lead">Bienvenido a Laravel {{auth()->user()->name}}, Estás Autenticado Correctamente.</p>
        @endauth

        @guest
        <h1>Inicio de Invitado</h1>
        <p class="lead">Para poder ingresar a la pagina primero Autenticate.</p>
        @endguest
    </div>
@endsection