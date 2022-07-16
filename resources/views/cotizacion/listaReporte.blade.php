<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <title>lista_Reporte_{{date('d-m-Y H:i:s')}}</title> 
    
    <style>
        .texto {
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          font-size: 15px;
        }
      </style>
  </head>
  <body>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
        
        <h2 class="texto" style="text-align: center;font-size: 20px;text-decoration: underline;">Sistema de Produccion de Ropa</h2>
        <p>Usuario: {{$nombreUsuario}}</p>
        <p>Fecha: <span> {{date('d-m-Y H:i:s')}}</span></p>
        <h4 class="texto">Lista de Cotizaciones :</h4>
        <table id="cotizaciones" class="table texto" style="border: 1px solid;text-align: center" >
            <thead>
            <tr >
                <th style="border: 1px solid" scope="col">ID</th>
                <th style="border: 1px solid" scope="col">Usuario</th>
                <th style="border: 1px solid" scope="col">Empresa</th>
                <th style="border: 1px solid" scope="col">Cliente</th>
                <th style="border: 1px solid" scope="col">Fecha Registro</th>
                <th style="border: 1px solid" scope="col">Fecha Entrega</th>
                <th style="border: 1px solid" scope="col" >Comentarios</th>
                <th style="border: 1px solid" scope="col">TOTAL</th>
            </tr>   
            </thead>
            <tbody >
                @foreach ($cotizaciones as $cotizacion)
                    @if ($cotizacion->estado!='eliminado')
                    <tr >
                        <td style="border: 1px solid">{{$cotizacion->id_cotizacion}}</td>
                        <td style="border: 1px solid">{{$cotizacion->users->name}}</td>
                        <td style="border: 1px solid">{{$cotizacion->empresas->nombre}}</td>
                        <td style="border: 1px solid">{{$cotizacion->clientes->primer_nombre}} {{$cotizacion->clientes->apellido_paterno}}</td>
                        <td style="border: 1px solid">{{$cotizacion->created_at}}</td>
                        <td style="border: 1px solid">{{$cotizacion->fecha_entrega}}</td>
                        <td style="border: 1px solid">{{$cotizacion->comentarios}}</td>
                        <td style="border: 1px solid"><span style="font-size: 14px" {{-- class="badge badge-success  d-inline" --}}>{{$cotizacion->total}}</span></td>
                    </tr>
                    @endif
                @endforeach
            </tbody>   
        </table>
        <p style="text-align: center;border-top: 30px">Empresa de Confeccion de Ropa, Sucre- Bolivia 2022</p> 
        <p style="text-align: center">Ubicación: Calle Mexico esq. Educadores Ch.</p> 


  </body>
</html>