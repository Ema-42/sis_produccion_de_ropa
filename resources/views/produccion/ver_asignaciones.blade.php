@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Asignaciones correspondientes al pedido </h1>
@stop

@section('content')
<form action="/produccion" method="POST">
        @csrf
        <table id="articulos" class="table table-striped table-hover">
            <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">ID Detalle</th>
                <th scope="col">Item</th>
                <th scope="col">Material</th>
                <th scope="col">Talla</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Asignar encargado</th>
            </tr>
            </thead>
            <tbody>
                {{-- LA FECHA DE TODOS LOS DETALLES --}}
                <input hidden type="text" name="fecha_entrega" value="{{$pedido->fecha_entrega}}">
                @foreach ($detalles as $detalle)
                @if ($detalle->id_pedido == $id_pedido)
                <tr>
                    <td><input hidden type="number" name="id_detalle_pedido[]" value="{{$detalle->id_detalle_pedido}}">{{$detalle->id_detalle_pedido}}</td>
                    <td ><input hidden type="number" name="id_articulo[]" value="{{$detalle->id_articulo}}" > {{$detalle->articulos->nombre}}</td>
                    <td ><input hidden type="number" name="id_material[]" value="{{$detalle->id_material}}"> {{$detalle->materiales->nombre}}</td>
                    <td ><input hidden type="number" name="id_talla[]" value="{{$detalle->id_talla}}" > {{$detalle->tallas->nombre}}</td>
                    <td ><input hidden type="number" name="cantidad[]" value="{{$detalle->cantidad}}"> {{$detalle->cantidad}}</td>
                    <td>
                        <select disabled style="width: 300px;font-size: 17px" name="id_encargado_produccion[]" {{-- id="id_encargado_produccion" --}} class="form-control col-md-4" aria-label="Disabled select example" tabindex="1">
                            @foreach ($producciones  as $produccion)
                                @if ($detalle->id_detalle_pedido==$produccion->id_detalle_pedido)
                                    <option  selected value="{{$produccion->id_encargado_produccion}}">{{$produccion->encargados->primer_nombre}} {{$produccion->encargados->segundo_nombre}} {{$produccion->encargados->apellido_paterno}} {{$produccion->encargados->apellido_materno}}</option>                                    
                               {{--  @else
                                    <option value="" >SIN ASIGNAR</option>
                                 --}}@endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>   
        </table>
    {{-- <button type="submit" class="btn btn-success">REALIZAR ASIGNACIONES</button> --}}
    <a href="/produccion/produciendo" class="btn btn-primary">VOLVER</a>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop