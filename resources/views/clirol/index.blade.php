@extends('layouts.app-master')

@section('template_title')
    Clirol
@endsection
@auth
@section('content')

@if (!(auth()->user()->email_verified_at))
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Pendiente verificación de correo</h4>
                </div>
            </div>
        @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dar Rol A Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clirols.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Username Usuario</th>
										<th>Email Usuario</th>
                                        <th>Rol</th>
                                        <th>Descripción</th>
										<th>Estado</th>
                                        <th>Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clirols as $clirol)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $clirol->user->username }}</td>
                                            <td>{{ $clirol->user->email }}</td>
											<td>{{ $clirol->role->rol }}</td>
                                            <td>{{ $clirol->role->descripcion }}</td>
											<td>{{ $clirol->estado }}</td>
                                            <td>{{ $clirol->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('clirols.destroy',$clirol->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clirols.show',$clirol->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver Completo') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clirols.edit',$clirol->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                </form>

                                                <form action="{{ route('clirols.update', $clirol->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="ACTIVO" class="btn btn-success btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>

                                            <form action="{{ route('clirols.update', $clirol->id) }}" method="POST">
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
                {!! $clirols->links() !!}
            </div>
        </div>
    </div>
@endif
@endsection
@endauth