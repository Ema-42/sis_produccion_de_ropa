@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Formulario de Registro de Proveedores</h1>
@stop

@section('content')
<form action="/proveedores" method="POST"  class="row g-3" >
    @csrf
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Primer Nombre</label>
        <input required id="primer_nombre" name="primer_nombre" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Segundo Nombre</label>
        <input id="segundo_nombre" name="segundo_nombre" type="text" class="form-control " tabindex="2">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Apellido Paterno</label>
        <input required id="apellido_paterno" name="apellido_paterno" type="text" class="form-control " tabindex="3">
    </div>
    <div class="mb-3 col-md-2">
        <label for="" class="form-label">Apellido Materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control " tabindex="4">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Numero DIP</label>
        <input required id="nro_dip" name="nro_dip" type="text" class="form-control " tabindex="9">
    </div>
    
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombre de la Empresa</label>
        <input required id="nombre_empresa" name="nombre_empresa" type="text" class="form-control " tabindex="4">
    </div>
    
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">NIT de la empresa</label>
        <input required id="nit" name="nit" type="text" class="form-control " tabindex="9">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control " tabindex="7">
    </div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Celular</label>
        <input required id="celular" name="celular" type="text" class="form-control " tabindex="8">
    </div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="email" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Direccion</label>
        <input required id="direccion" name="direccion" type="text" class="form-control " tabindex="11">
    </div>
    <div class="mb-3 col-md-4 ">
        <label for="" class="form-label">Fecha de Registro</label>
        <input disabled id="created_at" name="created_at" class="form-control" type="date"  min="1900-01-01"  value="{{date('Y-m-d')}}"tabindex="12"/>
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

@stop