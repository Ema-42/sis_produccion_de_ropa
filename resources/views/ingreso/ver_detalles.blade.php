@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Detalles del Ingreso de insumos</h1>
@stop

@section('content')
{{-- tablas unidad --}}
<table id="detalles" class="table table-striped table-hover">
    <thead style="background: rgb(55, 70, 80)" class=" text-white">
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
        <th scope="col">Tipo Comprobante</th>
        <th scope="col" >Numero Comprobante</th>
        <th scope="col">Total (Bs.)</th>
    </tr>    
    </thead>
    <tbody>
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
            <td>{{$ingreso->tipo_comprobante}}</td>
            <td>{{$ingreso->numero_comprobante}}</td>
            <td style="font-size: 20px;background:rgb(7, 145, 81);color: white ;width: 150px;text-align: center">{{$ingreso->total}}</td>
        </tr>
        <tr style="background: rgb(55, 70, 80)" class=" text-white">
            <th scope="col" >ID Detalle</th>
            <th scope="col" colspan="3" >Item</th>
            <th scope="col" >Precio Unitario</th>
            <th scope="col" >Cantidad</th>
            <th scope="col" colspan="2">Sub total</th>
            <th scope="col" colspan="4">Detalles de produccion</th>
        </tr>
        @foreach ($detalles as $detalle)
        @if ($detalle->id_ingreso == $id_ingreso)
        <tr>
            <td>{{$detalle->id_detalle_ingreso}}</td>
            <td colspan="3">{{$detalle->insumos->nombre}}</td>
            <td colspan="1">{{$detalle->precio_unitario}}</td>
            <td colspan="1">{{$detalle->cantidad}}</td>
            <td colspan="2">{{$detalle->sub_total}}</td>
            <td colspan="4">{{$detalle->detalles}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>   
</table>
<a   href="/ingresos"  class="btn btn-info">VOLVER</a>


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