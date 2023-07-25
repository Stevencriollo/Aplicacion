@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Actividad del Empleado</div>

                    <div class="card-body">
                        <center><h3>ID registro del empleado : {{ $empleadoActividad['idEmpActivid'] }}</h3></center>
                        <p><strong>Nombre del Empleado:</strong> {{ $empleadoActividad['nombreEmpleado'] }}</p>
                        <p><strong>Codigo de Empleado:</strong> {{ $empleadoActividad['idempleado'] }}</p>
                        <p><strong>Actividad:</strong> {{ $empleadoActividad['actividad'] }}</p>
                        <p><strong>Fecha de Inicio:</strong> {{ $empleadoActividad['fechaInicio'] }}</p>
                        <p><strong>Fecha de Fin:</strong> {{ $empleadoActividad['fechafin'] }}</p>
                        <p><strong>Estado:</strong> {{ $empleadoActividad['estado'] }}</p>

                        <a href="{{ route('empleadoactividades.edit', $empleadoActividad['idEmpActivid']) }}" class="btn btn-primary">Editar</a>

                        <form action="{{ route('empleadoactividades.destroy', $empleadoActividad['idEmpActivid']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
