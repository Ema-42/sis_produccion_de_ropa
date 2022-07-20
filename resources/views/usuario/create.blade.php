@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Formulario de Registro de Usuarios</h1>
@stop

@section('content')
<form action="/usuarios" method="POST"  class="row g-3" autocomplete="off" >
    @csrf
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombres</label>
        <input  required placeholder="Nombre de Usuario" id="nombre" name="nombre" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input placeholder="Correo" id="correo" name="correo" type="email" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label" >Contraseña</label>
        <input  id="password" name="password" type="password" class="form-control " tabindex="10">
    </div>
    <div class="mb-3 col-md-8"></div>
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