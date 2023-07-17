@extends('layouts.app-admin')

@section('template_title')
    Empleadocarrera
@endsection

@auth
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <strong><span id="card_title">
                                {{ __('Empleado y Carrera') }}
                            </span></strong>

                             <div class="float-right">
                                <a href="{{ route('empleadocarrera.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Empleado Id</th>
										<th>Carrera Id</th>
										<th>Periodo Id</th>
										<th>Fecha</th>
										<th>Estado</th>
                                        <th>Creado:</th>
                                        <th>Modificado:</th>
										<th>Modificado Por:</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleadocarreras as $empleadocarrera)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $empleadocarrera->empleado->apellidos }}</td>
											<td>{{ $empleadocarrera->carrera->nombrecarrera }}</td>
											<td>{{ $empleadocarrera->periodo->nombre }}</td>
											<td>{{ $empleadocarrera->fecha }}</td>
											<td>{{ $empleadocarrera->estado }}</td>
                                            <td>{{ $empleadocarrera->created_at }}</td>
                                            <td>{{ $empleadocarrera->updated_at }}</td>
											<td>{{ $empleadocarrera->usuariomodifica }}</td>

                                            <td>
                                                <form action="{{ route('empleadocarrera.destroy',$empleadocarrera->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('empleadocarrera.show',$empleadocarrera->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleadocarrera.edit',$empleadocarrera->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>

                                                <form action="{{ route('empleadocarrera.update', $empleadocarrera->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="ACTIVO" class="btn btn-success btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>

                                            <form action="{{ route('empleadocarrera.update', $empleadocarrera->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="DESACTIVADO" class="btn btn-danger btn-sm"><i class=""></i> {{ __('Estado No Activo') }}</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleadocarreras->links() !!}
            </div>
        </div>
    </div>
@endsection
@endauth