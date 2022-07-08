@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Listado de Ingresos de insumos</h1>
@stop

@section('content')
<a href="ingresos/create" class="btn btn-success mb-4">Nuevo Ingreso</a>

<table id="ingresos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">Proveedor (empresa)</th>
        <th scope="col">Proveedor (representante)</th>
        <th scope="col">Proveedor (celular)</th>
        <th scope="col">Proveedor (correo)</th>
        <th scope="col">ID Pedido</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Total (Bs.)</th>
        <th scope="col">Tipo Comprobante</th>
        <th scope="col" >Numero Comprobante</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>
        @foreach ($ingresos as $ingreso)
            <tr>
                <td>{{$ingreso->id_ingreso}}</td>
                <td>{{$ingreso->users->name}}</td>
                <td>{{$ingreso->empresas->nombre}}</td>
                <td>{{$ingreso->proveedores->nombre_empresa}}</td>
                <td>{{$ingreso->proveedores->primer_nombre}} {{$ingreso->proveedores->apellido_paterno}}</td>
                <td>{{$ingreso->proveedores->celular}}</td>
                <td>{{$ingreso->proveedores->correo}}</td>
                <td>{{$ingreso->id_pedido}}</td>
                <td>{{$ingreso->created_at}}</td>
                <td>{{$ingreso->total}}</td>
                <td>{{$ingreso->tipo_comprobante}}</td>
                <td>{{$ingreso->numero_comprobante}}</td>
                <td style="width: 230px">
                    <form action="{{route('ingresos.destroy',$ingreso->id_ingreso)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('ingresos.edit',$ingreso->id_ingreso)}}" class="btn btn-primary">Editar</a>
                        <a {{-- href="{{route('ingresos.ver_detalles',$ingreso->id_ingreso)}}" --}} class="btn btn-info">Detalles</a>
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
    $('#ingresos').DataTable({
        'lengthMenu':[[7,10,50,-1],[7,10,50,'All']]
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