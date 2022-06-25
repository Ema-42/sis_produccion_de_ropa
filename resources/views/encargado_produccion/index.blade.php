@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Listado de Personal encargado de la produción</h1>
@stop

@section('content')
<a href="encargado_producciones/create" class="btn btn-success mb-4">Nuevo Encargado</a>
<table id="producciones" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nro DIP</th>
        <th scope="col">Telefono</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de Nacimiento</th>
        <th scope="col">Fecha de Registro</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($encargados as $encargado)
            <tr>
                <td>
                    {{$encargado->id_encargado_produccion}}
                </td>
                <td>
                    {{$encargado->primer_nombre}}{{' '.$encargado->segundo_nombre}}
                </td>
                <td>
                    {{$encargado->apellido_paterno}}{{' '.$encargado->apellido_materno}}
                </td>
                <td>
                    {{$encargado->nro_dip}}
                </td>
                <td>
                    {{$encargado->telefono}}
                </td>
                <td>
                    {{$encargado->celular}}
                </td>
                <td>
                    {{$encargado->correo}}
                </td>
                <td>
                    {{$encargado->direccion}}
                </td>
                <td>
                    {{$encargado->fecha_nacimiento}}
                </td>
                <td>
                    {{$encargado->created_at}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('encargado_producciones.destroy',$encargado->id_encargado_produccion)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('encargado_producciones.edit',$encargado->id_encargado_produccion)}}" class="btn btn-primary">Editar</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#producciones').DataTable({
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