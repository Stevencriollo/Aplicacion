@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Actividad del Empleado</div>

                    <div class="card-body">
                        <form action="{{ route('empleadoactividades.update', $empleadoActividad['idEmpActivid']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="nombreEmpleado">ID empleado</label>
                                <input type="text" name="idEmpActivid" id="idEmpActivid" class="form-control" value="{{ $empleadoActividad['idEmpActivid'] }}" readonly required>
                            </div>

                            <div class="form-group">
                                <label for="nombreEmpleado">Codigo del Empleado</label>
                                <input type="text" name="idempleado" id="idempleado" class="form-control" value="{{ $empleadoActividad['idempleado'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nombreEmpleado">Nombre del Empleado</label>
                                <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control" value="{{ $empleadoActividad['nombreEmpleado'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="actividad">Actividad</label>
                                <input type="text" name="actividad" id="actividad" class="form-control" value="{{ $empleadoActividad['actividad'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fechaInicio">Fecha de Inicio</label>
                                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" value="{{ $empleadoActividad['fechaInicio'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fechafin">Fecha de Fin</label>
                                <input type="date" name="fechafin" id="fechafin" class="form-control" value="{{ $empleadoActividad['fechafin'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="number" name="estado" id="estado" class="form-control" value="{{ $empleadoActividad['estado'] }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
