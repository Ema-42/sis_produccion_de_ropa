@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Insumo</h1>
@stop

@section('content')
<form action="/insumos" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <select name="id_categoria_insumo" id="id_categoria_insumo" class=" form-control col-md-4" aria-label="Default select example" tabindex="1">
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id_categoria_insumo}}">{{$categoria->descripcion}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control col-md-4" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control col-md-6" tabindex="3">
    </div>
    <div>
        <img id="imagenSeleccionada" style="max-height: 200px" >
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Imagen</label><br>
        <input id="imagen" name="imagen" type="file" tabindex="4">
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