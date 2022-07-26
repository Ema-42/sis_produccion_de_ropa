@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
<a href="clientes/create" class="btn btn-success mb-4">Crear</a>
<table id="clientes" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Telefono</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col">Nro DIP</th>
        <th scope="col">Sexo</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de Nacimiento</th>
        <th scope="col">Fecha de Registro</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>
                    {{$cliente->id_cliente}}
                </td>
                <td>
                    {{$cliente->primer_nombre}}{{' '.$cliente->segundo_nombre}}
                </td>
                <td>
                    {{$cliente->apellido_paterno}}{{' '.$cliente->apellido_materno}}
                </td>
                <td>
                    {{$cliente->telefono}}
                </td>
                <td>
                    {{$cliente->celular}}
                </td>
                <td>
                    {{$cliente->direccion}}
                </td>
                <td>
                    {{$cliente->nro_dip}}
                </td>
                <td>
                    @if (strtolower($cliente->sexo) =='m')
                        M
                    @else
                        F
                    @endif
                    
                </td>
                <td>
                    {{$cliente->correo}}
                </td>
                <td>
                    {{$cliente->fecha_nacimiento}}
                </td>
                <td>
                    {{$cliente->created_at}}
                </td>
                <td>
                    {{$cliente->estado}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('clientes.destroy',$cliente->id_cliente)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('clientes.edit',$cliente->id_cliente)}}" class="btn btn-primary">Editar</a>
                        @if ($cliente->estado=='vigente')
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
    $('#clientes').DataTable({
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