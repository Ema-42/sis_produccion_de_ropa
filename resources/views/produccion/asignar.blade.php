@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Asiganar items para su produccion</h1>
@stop

@section('content')
<form action="/produccion" method="POST" >
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
                <input hidden type="text" name="id_pedido" value="{{$pedido->id_pedido}}">
                @foreach ($detalles as $detalle)
                @if ($detalle->id_pedido == $id_pedido)
                <tr>
                    <td><input hidden type="number" name="id_detalle_pedido[]" value="{{$detalle->id_detalle_pedido}}">{{$detalle->id_detalle_pedido}}</td>
                    <td ><input hidden type="number" name="id_articulo[]" value="{{$detalle->id_articulo}}" > {{$detalle->articulos->nombre}}</td>
                    <td ><input hidden type="number" name="id_material[]" value="{{$detalle->id_material}}"> {{$detalle->materiales->nombre}}</td>
                    <td ><input hidden type="number" name="id_talla[]" value="{{$detalle->id_talla}}" > {{$detalle->tallas->nombre}}</td>
                    <td ><input hidden type="number" name="cantidad[]" value="{{$detalle->cantidad}}"> {{$detalle->cantidad}}</td>
                    <td>
                        <select   name="id_encargado_produccion[]" class="form-control  col-md-4" aria-label="Default select example" tabindex="1" >
                            @foreach ($encargados as $encargado)
                                @if ($encargado->estado=='vigente')
                                    <option  value="{{$encargado->id_encargado_produccion}}">{{$encargado->primer_nombre}} {{$encargado->apellido_paterno}} {{$encargado->apellido_materno}}</option>
                                @endif                 
                            @endforeach                              
                        </select>
                    </td>
                    
                </tr>
                @endif
                @endforeach
            </tbody>   
        </table>
    <button type="submit" class="btn btn-success">REALIZAR ASIGNACIONES</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop