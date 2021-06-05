@extends('adminlte::page')

@section('title', 'Admin Cursos')

@section('content_header')
    <h1>Editar precio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.prices.update', $price) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Ingrese el nombre del precio" value="{{ old('name', $price->name) }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="value">Valor</label>
                    <input class="form-control @error('value') is-invalid @enderror" name="value" type="number" placeholder="Ingrese el valor del precio" value="{{ old('value', $price->value) }}">
                    @error('value')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Actualizar precio</button>
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
