<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Ingresa Username') }}
            {{ Form::select('user_id',$users,$clirol->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa Usuario']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ingresa Rol') }}
            {{ Form::select('role_id', $roles, $clirol->role_id, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa Rol']) }}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>