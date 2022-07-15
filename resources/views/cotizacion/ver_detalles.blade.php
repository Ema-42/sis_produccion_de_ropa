@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Detalles de la cotizacion</h1>
@stop

@section('content')

{{-- tablas unidad --}}
<table id="detalles" class="table table-striped table-hover">
    <thead style="background: rgb(55, 70, 80)" class=" text-white">
    <tr>
        <th scope="col">ID Cotizacion</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col" >Comentarios</th>
        <th scope="col" colspan="3">TOTAL</th>
    </tr>    
    </thead>
    <tbody>
        <tr>
            <td>{{$cotizacion->id_cotizacion}}</td>
            <td>{{$cotizacion->users->name}}</td>
            <td>{{$cotizacion->empresas->nombre}}</td>
            <td>{{$cotizacion->clientes->primer_nombre}} {{$cotizacion->clientes->apellido_paterno}}</td>
            <td>{{$cotizacion->created_at}}</td>
            <td>{{$cotizacion->fecha_entrega}}</td>
            <td>{{$cotizacion->comentarios}}</td>
            <td style="font-size: 20px;background:rgb(7, 145, 81);color: white ;width: 150px;text-align: center">{{$cotizacion->total}} Bs.</td>
        </tr>
        <tr style="background: rgb(55, 70, 80)" class=" text-white">
            <th scope="col">ID Detalle</th>
            <th scope="col"  >Item</th>
            <th scope="col" >Material</th>
            <th scope="col">Cantidad</th>
            <th scope="col" >Precio Unitario</th>
            <th scope="col" >Descuento</th>
            <th scope="col">Sub total</th>
            <th scope="col" >Detalles</th>
        </tr>
        {{-- LA FECHA DE TODOS LOS DETALLES --}}
        <input hidden type="text" name="fecha_entrega" value="{{$cotizacion->fecha_entrega}}">
        @foreach ($detalles as $detalle)
        @if ($detalle->id_cotizacion == $id_cotizacion)
            <tr>
                <td>{{$detalle->id_detalle_cotizacion}}</td>
                <td >{{$detalle->articulos->nombre}}</td>
                <td >{{$detalle->materiales->nombre}}</td>
                <td >{{$detalle->cantidad}}</td>
                <td >{{$detalle->precio_unitario}}</td>
                <td >{{$detalle->descuento}}</td>
                <td >{{$detalle->sub_total}}</td>
                <td >{{$detalle->detalles}}</td>
            </tr>
        @endif
        @endforeach

    </tbody>   
</table>
<a   href="/cotizaciones"  class="btn btn-info">VOLVER</a>


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