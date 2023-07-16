<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empleado_id') }}
            {{ Form::select('empleado_id',$empleados, $empleadocarrera->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado Id']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('carrera_id') }}
            {{ Form::select('carrera_id',$carreras, $empleadocarrera->carrera_id, ['class' => 'form-control' . ($errors->has('carrera_id') ? ' is-invalid' : ''), 'placeholder' => 'Carrera Id']) }}
            {!! $errors->first('carrera_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('periodo_id') }}
            {{ Form::select('periodo_id',$periodos, $empleadocarrera->periodo_id, ['class' => 'form-control' . ($errors->has('periodo_id') ? ' is-invalid' : ''), 'placeholder' => 'Periodo Id']) }}
            {!! $errors->first('periodo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $empleadocarrera->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
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