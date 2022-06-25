@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
<form action="/clientes/{{$cliente->id_cliente}}" method="POST"  class="row g-3" >
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Primer Nombre</label>
        <input id="primer_nombre" name="primer_nombre" type="text" class="form-control " tabindex="1" value="{{$cliente->primer_nombre}}">
    </div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Segundo Nombre</label>
        <input id="segundo_nombre" name="segundo_nombre" type="text" class="form-control " tabindex="2" value="{{$cliente->segundo_nombre}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Apellido Paterno</label>
        <input id="apellido_paterno" name="apellido_paterno" type="text" class="form-control " tabindex="3" value="{{$cliente->apellido_paterno}}">
    </div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Apellido Materno</label>
        <input id="apellido_materno" name="apellido_materno" type="text" class="form-control " tabindex="4" value="{{$cliente->apellido_materno}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Fecha de Nacimiento</label>
        <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" type="date"  min="1900-01-01" tabindex="5" value="{{$cliente->fecha_nacimiento}}"/>
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label" >Sexo</label>
        <select class="form-control" id="sexo" name="sexo" tabindex="6">
            @if (strtolower($cliente->sexo)=='m')
                <option selected value="m">Masculino</option>
                <option value="f">Femenino</option>
            @else
                <option selected value="f">Femenino</option>
                <option value="m">Masculino</option>
            @endif
        </select>
    </div>
    <div class="mb-3 col-md-8"></div>

    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control " tabindex="7" value="{{$cliente->telefono}}">
    </div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control " tabindex="8" value="{{$cliente->celular}}">
    </div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Numero DIP</label>
        <input id="nro_dip" name="nro_dip" type="text" class="form-control " tabindex="9" value="{{$cliente->nro_dip}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="email" class="form-control " tabindex="10" value="{{$cliente->correo}}">
    </div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control " tabindex="11" value="{{$cliente->direccion}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-12" >
        <a href="/clientes" class="btn btn-secondary" tabindex="13">Cancelar</a>
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