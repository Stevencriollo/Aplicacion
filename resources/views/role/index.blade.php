@auth

@extends('layouts.app-master')

@section('template_title')
    Role
@endsection

@section('content')

@if (!(auth()->user()->email_verified_at))
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Pendiente verificación de correo</h4>
                        <p class="card-text">Primero debes verificar tu correo electrónico, revisa tu bandeja de entrada</p>
                        <p class="card-text">Puedes generar otro con el botón de abajo</p>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Reenviar</button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                        <img src="https://cdn.icon-icons.com/icons2/491/PNG/512/email-timeout_48095.png" alt="Icono de correo electrónico" width="150px">
                    </div>
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
                                {{ __('Role') }}
                            </span>

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
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Correo</th>
										<th>Descripcion</th>
										<th>Rol</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $role->nombre }}</td>
											<td>{{ $role->correo }}</td>
											<td>{{ $role->descripcion }}</td>
											<td>{{ $role->rol }}</td>
                                            <td>{{ $role->estado }}</td>

                                            <td>
                                                <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('role.show',$role->id) }}"><i class=""></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('role.edit',$role->id) }}"><i class=""></i> {{ __('Edit') }}</a>
                                                </form>
                                                <form action="{{ route('role.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="activo" class="btn btn-success btn-sm"><i class=""></i> {{ __('Estado Activo') }}</button>
                                            </form>

                                            <form action="{{ route('role.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="estado" value="no-activo" class="btn btn-danger btn-sm"><i class=""></i> {{ __('Estado No Activo') }}</button>
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
    <style>
    .container-fluid {
        padding: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #card_title {
        font-weight: bold;
    }

    .float-right {
        text-align: right;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border-radius: 0.25rem;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table th {
        font-weight: bold;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .fa {
        font-size: 1rem;
    }

    .fa-fw {
        width: 1.5em;
        text-align: center;
    }

    .fa-eye:before {
        content: "\f06e";
    }

    .fa-edit:before {
        content: "\f044";
    }

    .fa-trash:before {
        content: "\f1f8";
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
@endsection

@endauth