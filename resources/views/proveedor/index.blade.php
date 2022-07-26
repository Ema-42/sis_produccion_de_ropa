@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Listado de Proveedores</h1>
@stop

@section('content')
<a href="proveedores/create" class="btn btn-success mb-4">Nuevo Proveedor</a>
<table id="proveedores" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nro DIP</th>
        <th scope="col">Nombre de Empresa</th>
        <th scope="col">NIT</th>
        <th scope="col">Telefono</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de Registro</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
            <tr>
                <td>
                    {{$proveedor->id_proveedor}}
                </td>
                <td>
                    {{$proveedor->primer_nombre}}{{' '.$proveedor->segundo_nombre}}
                </td>
                <td>
                    {{$proveedor->apellido_paterno}}{{' '.$proveedor->apellido_materno}}
                </td>
                <td>
                    {{$proveedor->nro_dip}}
                </td>
                <td>
                    {{$proveedor->nombre_empresa}}
                </td>
                <td>
                    {{$proveedor->nit}}
                </td>
                <td>
                    {{$proveedor->telefono}}
                </td>
                <td>
                    {{$proveedor->celular}}
                </td>
                <td>
                    {{$proveedor->direccion}}
                </td>
                <td>
                    {{$proveedor->correo}}
                </td>
                <td>
                    {{$proveedor->created_at}}
                </td>
                <td>
                    {{$proveedor->estado}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('proveedores.destroy',$proveedor->id_proveedor)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('proveedores.edit',$proveedor->id_proveedor)}}" class="btn btn-primary">Editar</a>
                        @if ($proveedor->estado=='vigente')
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
    $('#proveedores').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']],
        "order": [[ 0, "desc" ]]
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