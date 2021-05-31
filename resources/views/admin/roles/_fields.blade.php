<div class="form-group">
    {!! Form::label('name', 'Identificador') !!}
    {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' is-invalid': ''), 'placeholder' => 'Escriba un identificador único']) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('display_name', 'Nombre') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control'.($errors->has('display_name') ? ' is-invalid': ''), 'placeholder' => 'Escriba un nombre']) !!}
    @error('display_name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<strong>Permisos</strong>

@error('permissions')
    <br>
    <small class="text-danger">
        <strong>{{ $message }}</strong>
    </small>
@enderror

@foreach ($permissions as $permission)
    <div class="mt-2">
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{ $permission->display_name }}
        </label>
    </div>
@endforeach
