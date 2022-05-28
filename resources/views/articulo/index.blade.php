@extends('layouts.plantillabase')
{{-- mismo nombre de plantilla base --}}
@section('contenido')
<a href="articulos/create" class="btn btn-success">Crear</a>
<table class="table table-striped table-hover">
    <thead>
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
@endsection