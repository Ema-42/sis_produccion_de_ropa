@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Detalles del pedido</h1>
@stop

@section('content')
{{-- tablas separadas datos pedido y detalles pedido --}}

{{-- <table  id="pedidos" class="table table-striped table-hover">
    <thead style="background: rgb(55, 70, 80)"  class=" text-white">
    <tr>
        <th scope="col">ID Pedido</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">NIT</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Entregado</th>
        <th scope="col" >Comentarios</th>
        <th scope="col">Lugar de entrega</th>
        <th scope="col" >Descuento</th>
        <th scope="col">TOTAL</th>
    </tr>   
    </thead>
    <tbody>
            <tr>
                <td>{{$pedido->id_pedido}}</td>
                <td>{{$pedido->users->name}}</td>
                <td>{{$pedido->empresas->nombre}}</td>
                <td>{{$pedido->nit}}</td>
                <td>{{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}}</td>
                <td>{{$pedido->created_at}}</td>
                <td>{{$pedido->fecha_entrega}}</td>
                <td>{{$pedido->estado}}</td>
                <td>{{$pedido->fecha_entregado}}</td>
                <td>{{$pedido->comentarios}}</td>
                <td>{{$pedido->direccion_entrega}}</td>
                <td>{{$pedido->descuento}}</td>
                <td style="font-size: 30px;background:rgb(7, 145, 81);color: white ;width: 180px;text-align: center">{{$pedido->total}} Bs.</td>
            </tr>
    </tbody>   
</table> --}}


{{-- tablas unidad --}}
<table id="detalles" class="table table-striped table-hover">
    <thead style="background: rgb(55, 70, 80)" class=" text-white">
    <tr>
        <th scope="col">ID Pedido</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">NIT</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Entregado</th>
        <th scope="col" >Comentarios</th>
        <th scope="col">Lugar de entrega</th>
        <th scope="col" >Descuento</th>
        <th scope="col">TOTAL</th>
    </tr>    
    </thead>
    <tbody>
        <tr>
            <td>{{$pedido->id_pedido}}</td>
            <td>{{$pedido->users->name}}</td>
            <td>{{$pedido->empresas->nombre}}</td>
            <td>{{$pedido->nit}}</td>
            <td>{{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}}</td>
            <td>{{$pedido->created_at}}</td>
            <td>{{$pedido->fecha_entrega}}</td>
            <td>{{$pedido->estado}}</td>
            <td>{{$pedido->fecha_entregado}}</td>
            <td>{{$pedido->comentarios}}</td>
            <td>{{$pedido->direccion_entrega}}</td>
            <td>{{$pedido->descuento}}</td>
            <td style="font-size: 20px;background:rgb(7, 145, 81);color: white ;width: 150px;text-align: center">{{$pedido->total}} Bs.</td>
        </tr>
        <tr style="background: rgb(55, 70, 80)" class=" text-white">
            <th scope="col">ID Detalle</th>
            <th scope="col" colspan="2" >Item</th>
            <th scope="col" colspan="2">Material</th>
            <th scope="col">Talla</th>
            <th scope="col">Cantidad</th>
            <th scope="col" >Precio Unitario</th>
            <th scope="col" >Descuento</th>
            <th scope="col">Sub total</th>
            <th scope="col" colspan="3">Detalles de produccion</th>
        </tr>
        {{-- LA FECHA DE TODOS LOS DETALLES --}}
        <input hidden type="text" name="fecha_entrega" value="{{$pedido->fecha_entrega}}">
        @foreach ($detalles as $detalle)
        @if ($detalle->id_pedido == $id_pedido)
        <tr>
            <td>{{$detalle->id_detalle_pedido}}</td>
            <td colspan="2">{{$detalle->articulos->nombre}}</td>
            <td colspan="2">{{$detalle->materiales->nombre}}</td>
            <td >{{$detalle->tallas->nombre}}</td>
            <td >{{$detalle->cantidad}}</td>
            <td colspan="1">{{$detalle->precio_unitario}}</td>
            <td colspan="1">{{$detalle->descuento}}</td>
            <td >{{$detalle->sub_total}}</td>
            <td colspan="3">{{$detalle->detalles}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>   
</table>
<a   href="/pedidos"  class="btn btn-info">VOLVER</a>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#detalles').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']]
    });
    })
</script>
@stop