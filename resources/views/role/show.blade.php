@auth

@extends('layouts.app-master')

@section('template_title')
    {{ $role->name ?? "{{ __('Show') Role" }}
@endsection

@section('content')
<style>

.card {
  margin-top: 20px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #f5f5f5;
  padding: 25px;
  border-bottom: 1px solid #ddd;
}

.card-title {
  font-size: 18px;
  font-weight: bold;
}

.card-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

strong {
  font-weight: bold;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
  padding: 8px 16px;
  border-radius: 4px;
  text-decoration: none;
}

.btn-primary:hover {
  background-color: #0069d9;
}

.float-left {
  float: left;
}

.float-right {
  float: right;
}
.content {
  margin-top: 20px;
}

.col-md-12 {
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

</style>



    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('role.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $role->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $role->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $role->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $role->rol }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@endauth