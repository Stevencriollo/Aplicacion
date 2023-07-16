@extends('layouts.app-admin')

@section('template_title')
    {{ __('Create') }} Empleadocarrera
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Empleadocarrera</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleadocarrera.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empleadocarrera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
