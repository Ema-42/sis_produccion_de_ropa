@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Pedidos Pendientes de asignacion</h1>
@stop

@section('content')
<table id="pedidos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col">Dias Restantes</th>
        <th scope="col">Lugar de entrega</th>
        <th scope="col">TOTAL</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>

        @foreach ($pedidos as $pedido)
            @if ($pedido->estado!='eliminado')
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
                    <td style="width: 180px">
                        <form  method="POST" class="formBorrar">    
                            @csrf
                            <a href="{{route('produccion.asignar',$pedido->id_pedido)}}" class="btn btn-primary">Asignar Produccion</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#pedidos').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']]
    });
    })
</script>
@stop