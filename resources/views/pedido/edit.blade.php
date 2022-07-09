@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Editar Pedido</h1>
@stop

@section('content')
<table  id="pedidos" class="table table-striped table-hover">
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
                <td style="font-size: 30px;background:rgb(7, 145, 81);color: white ;width: 180px;text-align: center">{{$pedido->total}} Bs.</td>
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
    </tbody>   
</table>
<table id="detalles" class="table table-striped table-hover">

</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop