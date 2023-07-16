@extends('layouts.app-admin')

@section('template_title')
    Periodo
@endsection

@auth
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Periodo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('periodos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>Fechainicio</th>
										<th>Fechafin</th>
										<th>Estado</th>
                                        <th>Creado:</th>
                                        <th>Modificado:</th>
										<th>Modificado Por: </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $periodo->nombre }}</td>
											<td>{{ $periodo->fechainicio }}</td>
											<td>{{ $periodo->fechafin }}</td>
											<td>{{ $periodo->estado }}</td>
                                            <td>{{ $periodo->created_at }}</td>
                                            <td>{{ $periodo->updated_at }}</td>
											<td>{{ $periodo->usuariomodifica }}</td>

                                            <td>
                                                <form action="{{ route('periodos.destroy',$periodo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('periodos.show',$periodo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('periodos.edit',$periodo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>

                                                <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="ACTIVO" class="btn btn-success btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>

                                            <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
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
                {!! $periodos->links() !!}
            </div>
        </div>
    </div>
@endsection
@endauth