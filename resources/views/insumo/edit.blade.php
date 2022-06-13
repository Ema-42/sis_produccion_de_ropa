@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Insumo</h1>
@stop

@section('content')
    <form action="/insumos/{{$insumo->id_insumo}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Categoria</label>
            {{-- <input id="id_categoria_insumo" name="id_categoria_insumo" type="number" class="form-control" tabindex="1" value="{{$insumo->id_categoria_insumo}}"> --}}
            <select name="id_categoria_insumo" id="id_categoria_insumo" class="form-control col-md-4" aria-label="Default select example" tabindex="1"> 
                @foreach ($categorias as $categoria)
                    @if ($insumo->id_categoria_insumo==$categoria->id_categoria_insumo)
                        <option selected value="{{$categoria->id_categoria_insumo}}">{{$categoria->descripcion}}</option>
                    @else
                        <option  value="{{$categoria->id_categoria_insumo}}">{{$categoria->descripcion}}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control col-md-4" tabindex="2" value="{{$insumo->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control col-md-6" tabindex="3" value="{{$insumo->descripcion}}">
        </div>
        <div>
            <img src="/img/{{ $insumo->imagen }}" id="imagenSeleccionada" style="max-height: 200px" >
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Imagen</label><br>
            <input id="imagen" name="imagen" type="file" tabindex="4">
        </div>
        <a href="/insumos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    </form>

@stop

@section('css')
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