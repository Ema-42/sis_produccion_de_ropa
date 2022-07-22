@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Lista de Usuarios Bloqueados del Sistema</h1>
@stop

@section('content')
<table id="usuarios" class="table table-striped table-hover">
    <thead class="bg-black text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de Creacion de Usuario</th>
        <th scope="col">Fecha de Bloqueo</th>
        <th scope="col">Estado</th>
        <th scope="col">Rol</th>
        <th scope="col" style="width: 300px">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        @if ($usuario->state =='blocked')
            <tr>
                <td>
                    {{$usuario->id}}
                </td>
                <td>
                    {{$usuario->name}}
                </td>
                <td>
                    {{$usuario->email}}
                </td>
                <td>
                    {{$usuario->created_at}}
                </td>
                <td>
                    {{$usuario->updated_at}}
                </td>
                <td>
                    {{$usuario->state}}
                </td>
                <td>
                    {{$usuario->rol}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('usuarios.destroy',$usuario->id)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-warning">Editar</a>
                        {{-- <a href="{{route('usuarios.destroy',$usuario->id)}}" class="btn btn-primary">Desbloquear</a> --}}
                        <button type="submit" class="btn btn-primary"  >Desbloquear</button>
                    </form>
                </td>
            </tr>  
        @endif
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
    $('#usuarios').DataTable({
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
                    title: '¿Deseas Desbloquear este Usuario?',
                    text: "Éste usuario volverá a tener acceso al sistema!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Bloqueado!',
                        'El usuario fue eliminado existosamente.',
                        'success'
                        )
                    }
                    })
            }, false)
            })
        })()
</script>
@stop