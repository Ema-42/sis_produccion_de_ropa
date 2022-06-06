@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Insumo</h1>
@stop

@section('content')
    <form action="/insumos/{{$insumo->id_insumo}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            <input id="categoria" name="categoria" type="number" class="form-control" tabindex="1" value="{{$insumo->id_categoria_insumo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" value="{{$insumo->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3" value="{{$insumo->descripcion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Imagen</label>
            <input id="imagen" name="imagen" type="text" class="form-control" tabindex="4" value="{{$insumo->imagen}}">
        </div>
        <a href="/insumos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop