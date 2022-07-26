@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Formulario de Registro de Usuarios</h1>
@stop

@section('content')
<form action="/usuarios" method="POST"  class="row g-3" autocomplete="off" >
    @csrf
    <div class="mb-3 col-md-3">
        <label for="" class="form-label">Nombres</label>
        <input  required placeholder="Nombres" id="nombre" name="nombre" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-3">
        <label for="" class="form-label">Apellidos</label>
        <input  required placeholder="Apellidos" id="apellido" name="apellido" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-6"></div>
    <div class="mb-3 col-md-3" >
        <label for="" class="form-label">Correo</label>
        <input autocomplete="off" required placeholder="Correo" id="correo" value="" name="correo" type="email" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-3" >
        <label for="" class="form-label" >Contraseña</label>
        <input autocomplete="off" required id="password" name="password" type="password" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-6"></div>
    <div class="mb-3 col-md-3" >
        <label for="" class="form-label">Número de Identificación Personal</label>
        <input required placeholder="NDIP" id="ndip" value="" name="ndip" type="text" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-3">
        <label for="" class="form-label">Direccion</label>
        <input  required placeholder="Direccion" id="direccion" name="direccion" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-6"></div>
    <div class="mb-3 col-md-3">
        <label for="" class="form-label">Telefono/Celular</label>
        <input  required placeholder="Telefono/Celular" id="celular" name="celular" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-3" >
        <label for="" class="form-label" >Rol</label>
        <select name='rol'  id="rol" class="form-control" >
            @foreach ($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
                {{-- <option selected value="">Ninguno</option> --}}
        </select>
    </div>
    <div class="mb-3 col-md-12" >
        <a href="/usuarios" class="btn btn-secondary" tabindex="13">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="14">Guardar</button>
    </div>
</form>

    {{-- formulario de jetstraim --}}
    {{-- @include('auth.register') --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop