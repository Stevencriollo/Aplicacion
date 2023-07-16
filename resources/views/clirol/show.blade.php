@extends('layouts.app-master')

@section('template_title')
    {{ $clirol->name ?? "{{ __('Show') Clirol" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuarios y Roles</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clirols.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $clirol->role->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $clirol->role->rol }}
                        </div>

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $clirol->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $clirol->user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $clirol->user->username }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $clirol->user->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Codigopostal:</strong>
                            {{ $clirol->user->codigopostal }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $clirol->user->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

