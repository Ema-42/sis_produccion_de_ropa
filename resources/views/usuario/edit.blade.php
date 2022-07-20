@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Formulario de Edicion de Usuario</h1>
@stop

@section('content')
<form action="/usuarios/{{$usuario->id}}" method="POST"  class="row g-3" autocomplete="off" >
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombres</label>
        <input  required placeholder="Nombre de Usuario" id="nombre" name="nombre" value="{{$usuario->name}}" type="text" class="form-control " tabindex="1">
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input placeholder="Correo" id="correo" name="correo" type="email" class="form-control " value="{{$usuario->email}}">
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label" >Contraseña</label>
        <input  id="password" name="password" type="password" class="form-control " value="{{$usuario->password}}">
    </div>
    <div class="mb-3 col-md-8"></div>
    <div class="mb-3 col-md-12" >
        <a href="/usuarios" class="btn btn-secondary" tabindex="13">Cancelar</a>
        
        <button type="submit" class="btn btn-primary" tabindex="14">Guardar</button>
    </div>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop