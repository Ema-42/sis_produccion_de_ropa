@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
    <form action="{{ route('articulos.update',$articulo->id_articulo) }}{{-- /articulos/{{$articulo->id_articulo}} --}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            <br>
            <select name="id_categoria_articulo" id="id_categoria_articulo" class="form-control col-md-4" aria-label="Default select example" tabindex="1">
                    
                @foreach ($categorias as $categoria)
                    @if ($articulo->id_categoria_articulo==$categoria->id_categoria_articulo)
                        <option selected value="{{$categoria->id_categoria_articulo}}">{{$categoria->descripcion}}</option>
                    @else
                        <option  value="{{$categoria->id_categoria_articulo}}">{{$categoria->descripcion}}</option>
                    @endif
                @endforeach
              </select>
            {{-- <input id="id_categoria_articulo" name="id_categoria_articulo" type="number" class="form-control" tabindex="1" value="{{$articulo->id_categoria_articulo}}"> --}}
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control col-md-4" tabindex="2" value="{{$articulo->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control col-md-6" tabindex="3" value="{{$articulo->descripcion}}">
        </div>
        <div>
            <img src="/img/{{ $articulo->imagen }}" id="imagenSeleccionada" style="max-height: 200px" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Imagen</label><br>
            <input id="imagen" name="imagen" type="file" tabindex="4">
        </div>
        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    </form>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function (e){
        $('#imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) =>{
                $('#imagenSeleccionada').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@stop