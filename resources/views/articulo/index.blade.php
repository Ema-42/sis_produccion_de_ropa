@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Articulos</h1>
@stop

@section('content')
<a href="articulos/create" class="btn btn-success mb-4">Crear</a>
<table id="articulos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Categoria</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Imagen</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
            <tr>
                <td>
                    {{$articulo->id_articulo}}
                </td>
                <td>
                    {{$articulo->id_categoria_articulo}}
                </td>
                <td>
                    {{$articulo->nombre}}
                </td>
                <td>
                    {{$articulo->descripcion}}
                </td>
                <td>
                    {{$articulo->imagen}}
                </td>
                <td>
                    <form action="{{route('articulos.destroy',$articulo->id_articulo)}}" method="POST">    
                        @csrf
                        @method('DELETE')
                        <a href="/articulos/{{$articulo->id_articulo}}/edit" class="btn btn-info">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>   
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#articulos').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']]
    });
    })
</script>
@stop