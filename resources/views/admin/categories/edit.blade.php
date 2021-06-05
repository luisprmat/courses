@extends('adminlte::page')

@section('title', 'Admin Cursos')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Ingrese el nombre de la categoría" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Actualizar categoría</button>
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
