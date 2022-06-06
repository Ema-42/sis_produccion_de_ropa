@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Insumos</h1>
@stop

@section('content')
<a href="insumos/create" class="btn btn-success mb-4">Crear</a>
<table id="insumos" class="table table-striped table-hover">
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
        @foreach ($insumos as $insumo)
            <tr>
                <td>
                    {{$insumo->id_insumo}}
                </td>
                <td>
                    {{$insumo->id_categoria_insumo}}
                </td>
                <td>
                    {{$insumo->nombre}}
                </td>
                <td>
                    {{$insumo->descripcion}}
                </td>
                <td>
                    {{$insumo->imagen}}
                </td>
                <td>
                    <form action="{{route('insumos.destroy',$insumo->id_insumo)}}" method="POST">    
                        @csrf
                        @method('DELETE')
                        <a href="/insumos/{{$insumo->id_insumo}}/edit" class="btn btn-info">Editar</a>
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
    $('#insumos').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']]
    });
    })
</script>
@stop