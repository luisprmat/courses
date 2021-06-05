@extends('adminlte::page')

@section('title', 'Admin Cursos')

@section('content_header')
    <h1>Nuevo nivel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.levels.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Ingrese el nombre del nivel" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Crear nivel</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
