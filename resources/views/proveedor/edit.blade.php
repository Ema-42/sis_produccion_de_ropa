@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<form action="/proveedores/{{$proveedor->id_proveedor}}" method="POST"  class="row g-3" >
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Primer Nombre</label>
        <input required id="primer_nombre" name="primer_nombre" type="text" class="form-control " tabindex="1" value="{{$proveedor->primer_nombre}}">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Segundo Nombre</label>
        <input id="segundo_nombre" name="segundo_nombre" type="text" class="form-control " tabindex="2" value="{{$proveedor->segundo_nombre}}">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Apellido Paterno</label>
        <input required id="apellido_paterno" name="apellido_paterno" type="text" class="form-control " tabindex="3" value="{{$proveedor->apellido_paterno}}">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Apellido Materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control " tabindex="4"  value="{{$proveedor->apellido_materno}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Numero DIP</label>
        <input required id="nro_dip" name="nro_dip" type="text" class="form-control " tabindex="9"  value="{{$proveedor->nro_dip}}">
    </div>
    
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombre de la Empresa</label>
        <input required id="nombre_empresa" name="nombre_empresa" type="text" class="form-control " tabindex="4" value="{{$proveedor->nombre_empresa}}">
    </div>
    
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">NIT de la empresa</label>
        <input id="nit" name="nit" type="text" class="form-control " tabindex="9" value="{{$proveedor->nit}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control " tabindex="7" value="{{$proveedor->telefono}}">
    </div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Celular</label>
        <input required id="celular" name="celular" type="text" class="form-control " tabindex="8" value="{{$proveedor->celular}}">
    </div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="email" class="form-control " tabindex="10" value="{{$proveedor->correo}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Direccion</label>
        <input required id="direccion" name="direccion" type="text" class="form-control " tabindex="11" value="{{$proveedor->direccion}}">
    </div>
    <div class="mb-3 col-md-12" >
        <a href="/proveedores" class="btn btn-secondary" tabindex="13">Cancelar</a>
        {{-- laravel ya sabe que este guardas va deriar al store del controlador de clientes --}}
        <button type="submit" class="btn btn-primary" tabindex="14">Guardar</button>
    </div>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop