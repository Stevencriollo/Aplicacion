@extends('layouts.app-master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Actividad De Empleado</div>

                    <div class="card-body">
                        <form action="{{ route('empleadoactividades.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombreEmpleado">Codigo Empleado</label>
                                <input type="text" name="idempleado" id="idempleado" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label for="nombreEmpleado">Nombre del Empleado</label>
                                <input type="text" name="nombreEmpleado" id="nombreEmpleado" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="actividad">Actividad</label>
                                <input type="text" name="actividad" id="actividad" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fechaInicio">Fecha de Inicio</label>
                                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fechafin">Fecha de Fin</label>
                                <input type="date" name="fechafin" id="fechafin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="number" name="estado" id="estado" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
