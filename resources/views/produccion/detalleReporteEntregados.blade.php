<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>detalle_Produccion_Reporte_{{date('d-m-Y H:i:s')}}</title> 
    <p><a style="font-weight: bold;">Fecha Impreso:</a> {{date('d-m-Y H:i:s')}}</p>
    <style>
        .texto {
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          font-size: 15px;
        }
      </style>
  </head>
  <body>
  
        <h2 class="texto" style="text-align: center;font-size: 20px;text-decoration: underline;">Sistema de Produccion de Ropa</h2>
        
        <div style="margin-top: 45px;margin-bottom: 0px">
            <div style="display: inline-block;width: 40%">
                <p><a style="font-weight: bold;">Cliente: </a>{{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}} </p>
                <p><a style="font-weight: bold;">Fecha Registro: </a>{{$pedido->created_at}}</p>
                <p><a style="font-weight: bold;">Fecha Entrega: </a>{{$pedido->fecha_entrega}} </p>
                <p><a style="font-weight: bold;">TOTAL (Bs.): </a>{{$pedido->total}}  </p>
            </div>
            <div style="display: inline-block;width: 50%">
                <p><a style="font-weight: bold;">ID del Pedido: </a>{{$pedido->id_pedido}}  </p>
                <a style="font-weight: bold;">Usuario Generador de Reporte: </a>{{$nombreUsuario}}
                <p><a style="font-weight: bold;">Usuario de Registro: </a>{{$pedido->users->name}} </p>
                <p><a style="font-weight: bold;">Empresa: </a>{{$pedido->empresas->nombre}} </p>
            </div>
        </div>
        <p class="texto">Detalles del pedido entregado :</p>
        <table class="texto" style="border: 1px solid; width: 100%">
            <thead style="border: 1px solid; background: black;color: white">
            <tr style="border: 1px solid;">
                <th scope="col" style="border: 1px solid;">ID Detalle</th>
                <th scope="col" style="border: 1px solid;">Item</th>
                <th scope="col" style="border: 1px solid;">Material</th>
                <th scope="col" style="border: 1px solid;">Talla</th>
                <th scope="col" style="border: 1px solid;">Cantidad</th>
                <th scope="col" style="border: 1px solid;">Detalles</th>
                <th scope="col" style="border: 1px solid;">Encargado Asignado</th>
            </tr>
            </thead>
            <tbody style="border: 1px solid;">
                {{-- LA FECHA DE TODOS LOS DETALLES --}}
                
                @foreach ($detalles as $detalle)
                @if ($detalle->id_pedido == $id_pedido)
                <tr style="border: 1px solid;">
                    <td style="border: 1px solid;"><input hidden type="number" name="id_detalle_pedido[]" value="{{$detalle->id_detalle_pedido}}">{{$detalle->id_detalle_pedido}}</td>
                    <td style="border: 1px solid;" ><input hidden type="number" name="id_articulo[]" value="{{$detalle->id_articulo}}" > {{$detalle->articulos->nombre}}</td>
                    <td style="border: 1px solid;" ><input hidden type="number" name="id_material[]" value="{{$detalle->id_material}}"> {{$detalle->materiales->nombre}}</td>
                    <td style="border: 1px solid;" ><input hidden type="number" name="id_talla[]" value="{{$detalle->id_talla}}" > {{$detalle->tallas->nombre}}</td>
                    <td style="border: 1px solid;" ><input hidden type="number" name="cantidad[]" value="{{$detalle->cantidad}}"> {{$detalle->cantidad}}</td>
                    <td style="border: 1px solid;" ><input hidden type="number" name="detalle[]" value="{{$detalle->detalles}}"> {{$detalle->detalles}}</td>
                    
                    <td style="border: 1px solid;">
                            @foreach ($producciones  as $produccion)
                                @if ($detalle->id_detalle_pedido==$produccion->id_detalle_pedido)
                                {{$produccion->encargados->primer_nombre}} {{$produccion->encargados->segundo_nombre}} {{$produccion->encargados->apellido_paterno}} {{$produccion->encargados->apellido_materno}}
                                @endif
                            @endforeach
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>   
        </table>
        <p style="text-align: center;border-top: 30px">Empresa de Confeccion de Ropa, Sucre- Bolivia 2022</p> 
        <p style="text-align: center">Ubicación: Calle Mexico esq. Educadores Ch.</p> 
  </body>
</html>