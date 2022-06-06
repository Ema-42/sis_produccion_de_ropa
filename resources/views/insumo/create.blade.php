@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Insumo</h1>
@stop

@section('content')
<form action="/insumos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <input id="categoria" name="categoria" type="number" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="text" class="form-control" tabindex="4">
    </div>
    <a href="/insumos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    {{-- laravel ya sabe que este guardas va deriar al store del controlador de articulos --}}
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop