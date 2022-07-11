<table id="cotizaciones" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Fecha Entrega</th>
        <th scope="col" >Comentarios</th>
        <th scope="col">TOTAL</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>
        @foreach ($cotizaciones as $cotizacion)
            @if ($cotizacion->estado!='eliminado')
            <tr>
                <td>{{$cotizacion->id_cotizacion}}</td>
                <td>{{$cotizacion->users->name}}</td>
                <td>{{$cotizacion->empresas->nombre}}</td>
                <td>{{$cotizacion->clientes->primer_nombre}} {{$cotizacion->clientes->apellido_paterno}}</td>
                <td>{{$cotizacion->created_at}}</td>
                <td>{{$cotizacion->fecha_entrega}}</td>
                <td>{{$cotizacion->comentarios}}</td>
                <td>{{$cotizacion->total}}</td>

                @if ($cotizacion->estado=='activo')
                    <td style="width: 290px">
                        <form action="{{route('cotizaciones.destroy',$cotizacion->id_cotizacion)}}" method="POST" class="formBorrar">    
                            @csrf
                            @method('DELETE')
                            <a {{-- href="{{route('cotizaciones.ver_detalles',$cotizacion->id_cotizacion)}}"  --}}class="btn btn-primary">Iniciar Pedido</a>
                            {{-- <a href="{{route('pedidos.edit',$pedido->id_pedido)}}" class="btn btn-primary">Editar</a> --}}
                            <a href="{{route('cotizaciones.ver_detalles',$cotizacion->id_cotizacion)}}" class="btn btn-info">Detalles</a>
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endif
        @endforeach
    </tbody>   
</table>