@extends('adminlte::page')

@section('title', 'Admin Cursos')

@section('content_header')
    <h1>Editar rol: <strong>{{ $role->display_name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}
                @include('admin.roles._fields')
                {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
