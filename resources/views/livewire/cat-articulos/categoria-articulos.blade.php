
@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Categoria de Articulos</h1>
@stop

@section('content')
<div>
    
    {{-- Care about people's approval and you will be their prisoner. --}}
    <table class="table-fixed w-full" >
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">ID</th>
                <th  class="px-4 py-2">Nombre</th>
                <th  class="px-4 py-2">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoria_articulos as $categoria)
            <tr>
                <td class="boder px-4 py-2">{{$categoria->id_categoria_articulo}}</td>
                <td class="boder px-4 py-2">{{$categoria->nombre}}</td>
                <td class="boder px-4 py-2">{{$categoria->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
   
@stop

@section('css')
    <link  rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

