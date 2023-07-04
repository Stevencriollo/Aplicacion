@extends('layouts.app-master')

@section('template_title')
    {{ $role->name ?? "{{ __('Show') Role" }}
@endsection

@section('content')
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
                            <strong>Descripcion:</strong>
                            {{ $role->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $role->rol }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $role->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
