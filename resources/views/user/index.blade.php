@extends('layouts.app-master')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>
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
                                        
										<th>Name</th>
										<th>Email</th>
										<th>Username</th>
										<th>Direccion</th>
										<th>Codigopostal</th>
										<th>Telefono</th>
										<th>Estado</th>
                                        <th>Actualizacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                           
                                            <td>{{ $user->id }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->username }}</td>
											<td>{{ $user->direccion }}</td>
											<td>{{ $user->codigopostal }}</td>
											<td>{{ $user->telefono }}</td>
											<td>{{ $user->estado }}</td>
                                            <td>{{ $user->updated_at}}</td>

                                            <td>
                                                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('user.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class=""></i> {{ __('Edit') }}</a>
                                                </form>
                                                
                                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="ACTIVO" class="btn btn-sm btn-primary btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>
                                            <form action="{{ route('user.update', $user->id) }}" method="POST">
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
