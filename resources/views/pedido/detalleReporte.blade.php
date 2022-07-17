<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>detalle_Cotizacion_Reporte_{{date('d-m-Y H:i:s')}}</title> 
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
                <p><a style="font-weight: bold;">ID de la Pedido: </a>{{$pedido->id_pedido}}  </p>
                <a style="font-weight: bold;">Usuario Generador de Reporte: </a>{{$nombreUsuario}}
                <p><a style="font-weight: bold;">Usuario del Registro de Pedido: </a>{{$pedido->users->name}} </p>
                <p><a style="font-weight: bold;">Empresa: </a>{{$pedido->empresas->nombre}} </p>
            </div>
        </div>
        <p class="texto">Detalles de la Pedido :</p>
        <table class="texto" style="border: 1px solid; width: 100%">
            <thead style="border: 1px solid; background: black;color: white" >
            <tr style="border: 1px solid;">
                <tr  style="border: 1px solid;">
                    <th scope="col" style="border: 1px solid;">ID Detalle</th>
                    <th scope="col" style="border: 1px solid;"  >Item</th>
                    <th scope="col" style="border: 1px solid;" >Material</th>
                    <th scope="col" style="border: 1px solid;">Cantidad</th>
                    <th scope="col" style="border: 1px solid;" >Precio Unitario</th>
                    <th scope="col" style="border: 1px solid;" >Descuento</th>
                    <th scope="col" style="border: 1px solid;">Sub total</th>
                    <th scope="col" style="border: 1px solid;" >Detalles</th>
                </tr>
            </tr>    
            </thead>
            <tbody >
                {{-- LA FECHA DE TODOS LOS DETALLES --}}
                @foreach ($detalles as $detalle)
                @if ($detalle->id_pedido == $id_pedido)
                    <tr style="border: 1px solid;">
                        <td style="border: 1px solid;">{{$detalle->id_detalle_pedido}}</td>
                        <td style="border: 1px solid;" >{{$detalle->articulos->nombre}}</td>
                        <td style="border: 1px solid;" >{{$detalle->materiales->nombre}}</td>
                        <td style="border: 1px solid;" >{{$detalle->cantidad}}</td>
                        <td style="border: 1px solid;" >{{$detalle->precio_unitario}}</td>
                        <td style="border: 1px solid;" >{{$detalle->descuento}}</td>
                        <td style="border: 1px solid;" >{{$detalle->sub_total}}</td>
                        <td style="border: 1px solid;" >{{$detalle->detalles}}</td>
                    </tr>
                @endif
                @endforeach
            </tbody>   
        </table>
        <p style="text-align: center;border-top: 30px">Empresa de Confeccion de Ropa, Sucre- Bolivia 2022</p> 
        <p style="text-align: center">Ubicación: Calle Mexico esq. Educadores Ch.</p> 
  </body>
</html>