<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigoempleado') }}
            {{ Form::text('codigoempleado', $empleado->codigoempleado, ['class' => 'form-control' . ($errors->has('codigoempleado') ? ' is-invalid' : ''), 'placeholder' => 'Codigoempleado']) }}
            {!! $errors->first('codigoempleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos') }}
            {{ Form::text('apellidos', $empleado->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombres') }}
            {{ Form::text('nombres', $empleado->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::select('user_id', $users,$empleado->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaingreso') }}
            {{ Form::date('fechaingreso', $empleado->fechaingreso, ['class' => 'form-control' . ($errors->has('fechaingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fechaingreso']) }}
            {!! $errors->first('fechaingreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        {{ Form::label('usuariomodifica') }}
        {{ Form::text('usuariomodifica', $emailUsuarioActual, ['class' => 'form-control' . ($errors->has('usuariomodifica') ? ' is-invalid' : ''), 'placeholder' => 'Usuariomodifica', 'readonly']) }}
        {!! $errors->first('usuariomodifica', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>