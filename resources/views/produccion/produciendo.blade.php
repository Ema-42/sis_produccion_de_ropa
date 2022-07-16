@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Pedidos en etapa de Produccion</h1>
@stop

@section('content')
<table id="pedidos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID Pedido</th>
        <th scope="col">Usuario</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro del Pedido</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col">Dias Restantes</th>
        <th scope="col">Lugar de entrega</th>
        <th scope="col">TOTAL</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
        @if ($pedido->estado =='produccion')
            <tr>
                <td>{{$pedido->id_pedido}}</td>
                <td>{{$pedido->users->name}}</td>                
                <td>{{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}}</td>
                <td>{{$pedido->created_at}}</td>
                <td>{{$pedido->fecha_entrega}}</td>
                @if (intval($pedido->dias())> 5)
                    <td style=" background: #58ca67;text-align: center; font-size: 17px;"><b>{{$pedido->dias()+0}}</b></td>                   
                @endif
                @if (intval($pedido->dias()) >= 2 and intval($pedido->dias())<= 5)
                    <td style=" background: yellow;text-align: center; font-size: 17px;"><b>{{$pedido->dias()+0}}</b></td>                   
                @endif
                @if (intval($pedido->dias()) <= 1)
                    <td style=" background: #C70039;text-align: center;color:white; font-size: 17px;"><b>{{$pedido->dias()+0}}</b></td>                   
                @endif
                <td>{{$pedido->direccion_entrega}}</td>
                <td>{{$pedido->total}}</td>
                <td style="width: 420px">
                    <form action="{{route('produccion.entregar',$pedido->id_pedido)}}" method="POST" class="formEntregar">    
                        @csrf
                        <a href="{{route('produccion.ver_asignaciones',$pedido->id_pedido)}}" class="btn btn-info">Ver Asignaciones</a>
                        <a href="{{route('produccion.edit',$pedido->id_pedido)}}" class="btn btn-warning">Editar Asignaciones</a>
                        <button type="submit" class="btn btn-success">Entregado</button>
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
    $('#pedidos').DataTable({
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
        var forms = document.querySelectorAll('.formEntregar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Desea registrar este pedido como entregado?',
                    text: "El pedido ahora estará disponible en la lista de entregados",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Registrado como entregado!',
                        'El registro fue actualizado existosamente.',
                        'success'
                        )
                    }
                    })
            }, false)
            })
        })()
</script>
@stop