@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Realizar Cotización</h1>
@stop

@section('content')
<form action="/pedidos" method="POST" class="row g-3">
    @csrf
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Empresa</label>
        <select name="id_empresa" id="id_empresa" class=" form-control" aria-label="Default select example" tabindex="1">
            @foreach ($empresas as $empresa)
                <option value="{{$empresa->id_empresa}}">{{$empresa->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-md-4">
        <label hidden for="" class="form-label ">NIT</label>
        <input hidden readonly id="nit" name="nit" type="number" class="form-control" tabindex="2"
        value=""
        >
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Cliente</label><br>
        <select name="id_cliente" id="id_cliente" class="form-control select_clientes" aria-label="Default select example" tabindex="2" >
            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id_cliente}}">{{$cliente->primer_nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}</option>
            @endforeach
                <option selected value="">Ninguno</option>
          </select>
    </div>  
    
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Fecha de Entrega</label>
        <input id="fecha_entrega" name="fecha_entrega" class="form-control" type="date"  min="1900-01-01" tabindex="5"/>
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label ">Descuento (%)</label>
        <input id="descuento" name="descuento" type="number" class="form-control" tabindex="2" value="0" min="0" max="100">
    </div>
    
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Comentarios</label>
        <input id="comentarios" name="comentarios" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Direccion de entrega</label>
        <input id="direccion_entrega" name="direccion_entrega" type="text" class="form-control" tabindex="3">
    </div>
    
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">TOTAL (Bs.)</label>
        <input  id="total" name="total" type="number" class="form-control" tabindex="3">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-12">
        <a href="/pedidos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        {{-- laravel  sabe que este guardas va deriar al store del controlador de articulos --}}
        <button type="submit" class="btn btn-success" tabindex="6">GUARDAR PEDIDO</button>
    </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- select con busqueda --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- select con busqueda --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select_clientes').select2();
    });
</script>

@stop