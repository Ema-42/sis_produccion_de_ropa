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
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($insumos as $insumo)
            <tr>
                <td  style="width: 50px">
                    {{$insumo->id_insumo}}
                </td>
                <td  style="width: 222px">
                    {{$insumo->categoria_insumos->descripcion}}
                </td>
                <td style="width: 180px">
                    {{$insumo->nombre}}
                </td>
                <td style="width: 250px">
                    {{$insumo->descripcion}}
                </td>
                <td >
                    <img src="/img/{{$insumo->imagen}}" width="6%">
                </td>
                <td style="width: 180px">
                    {{$insumo->estado}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('insumos.destroy',$insumo->id_insumo)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('insumos.edit',$insumo->id_insumo)}}" class="btn btn-primary">Editar</a>
                        @if ($insumo->estado=='vigente')
                             <button type="submit" class="btn btn-danger">Borrar</button>
                        @else
                            <button type="submit" class="btn btn-success">Activar</button>
                        @endif
                        
                        
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.formBorrar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Desea eliminado este registro?',
                    text: "esta a punto de eliminado este registro!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Eliminado!',
                        'El registro fue eliminado existosamente.',
                        'success'
                        )
                    }
                    })
            }, false)
            })
        })()
</script>
@stop