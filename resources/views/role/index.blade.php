@extends('layouts.app-master')

@section('template_title')
    Role
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

                            <strong><span id="card_title">
                                {{ __('Roles') }}
                            </span></strong>

                             <div class="float-right">
                                <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>ID</th>
                                        <th>Rol</th>
										<th>Descripción</th>
										<th>Estado</th>
                                        <th>Actualización</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->rol }}</td>
											<td>{{ $role->descripcion }}</td>
											<td>{{ $role->estado }}</td>
                                            <td>{{ $role->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('role.show',$role->id) }}"><i class=""></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('role.edit',$role->id) }}"><i class=""></i> {{ __('Edit') }}</a>
                                                </form>

                                                <form action="{{ route('role.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="ACTIVO" class="btn btn-success btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>

                                            <form action="{{ route('role.update', $role->id) }}" method="POST">
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
                {!! $roles->links() !!}
            </div>
        </div>
    </div>
@endif
@endsection
@endauth