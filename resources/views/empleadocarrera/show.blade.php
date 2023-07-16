@extends('layouts.app-admin')

@section('template_title')
    {{ $empleadocarrera->name ?? "{{ __('Show') Empleadocarrera" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleadocarrera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleadocarrera.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleado Id:</strong>
                            {{ $empleadocarrera->empleado->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera Id:</strong>
                            {{ $empleadocarrera->carrera->nombrecarrera }}
                        </div>
                        <div class="form-group">
                            <strong>Periodo Id:</strong>
                            {{ $empleadocarrera->periodo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $empleadocarrera->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $empleadocarrera->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Usuariomodifica:</strong>
                            {{ $empleadocarrera->usuariomodifica }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
