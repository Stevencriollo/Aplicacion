@extends('layouts.app-master')

@section('content')
    <div class="container">
    <center><h1>Actividades de Empleados [consumo]</h1></center>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <strong><span id="card_title">
                                {{ __('Actividades de Empleado') }}
                            </span></strong>

                             <div class="float-right">
                                <a href="{{ route('empleadoactividades.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Agregar nuevo Empleado') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                    <th>ID</th>
                                    <th>Codigo Empleado</th>
                                    <th>Nombre Empleado</th>
                                    <th>Actividad</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Estado</th>
                                    <th>Lista de Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($empleadoActividades as $empleadoActividad)
                                    <tr>
                                        <td>{{ $empleadoActividad['idEmpActivid'] }}</td>
                                        <td>{{ $empleadoActividad['idempleado'] }}</td>
                                        <td>{{ $empleadoActividad['nombreEmpleado'] }}</td>
                                        <td>{{ $empleadoActividad['actividad'] }}</td>
                                        <td>{{ $empleadoActividad['fechaInicio'] }}</td>
                                        <td>{{ $empleadoActividad['fechafin'] }}</td>
                                        <td>{{ $empleadoActividad['estado'] }}</td>
                                        <td>
                                            <a href="{{ route('empleadoactividades.show', $empleadoActividad['idEmpActivid']) }}" class="btn btn-info btn-sm">Ver</a>
                                            <a href="{{ route('empleadoactividades.edit', $empleadoActividad['idEmpActivid']) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('empleadoactividades.destroy', $empleadoActividad['idEmpActivid']) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar el registro?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
