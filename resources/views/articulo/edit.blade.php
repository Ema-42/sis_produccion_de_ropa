@extends('layouts.plantillabase')
@section('contenido')
<h2>Editar Articulo</h2>

<form action="/articulos/{{$articulo->id_articulo}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <input id="categoria" name="categoria" type="number" class="form-control" tabindex="1" value="{{$articulo->id_categoria_articulo}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" value="{{$articulo->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3" value="{{$articulo->descripcion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="text" class="form-control" tabindex="4" value="{{$articulo->imagen}}">
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

</form>

@endsection