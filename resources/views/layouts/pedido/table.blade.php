<table id="pedidos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID Pedido</th>
        <th scope="col">Usuario</th>
        <th scope="col">Empresa</th>
        <th scope="col">NIT</th>
        <th scope="col">Cliente</th>
        <th scope="col">ID Cotizacion</th>
        <th scope="col">Fecha Entrega</th>
        {{-- <th scope="col">Fecha Entregado</th> --}}
        <th scope="col">Lugar de entrega</th>
        <th scope="col">TOTAL</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
            @if ($pedido->estado!='eliminado')
            <tr @if ($pedido->estado=='entregado') style=" background: #E0FFDE ;" @endif
                @if ($pedido->estado=='produccion') style=" background: rgb(195, 226, 252) ;" @endif>
                <td>{{$pedido->id_pedido}}</td>
                <td>{{$pedido->users->name}}</td>
                <td>{{$pedido->empresas->nombre}}</td>
                <td>{{$pedido->nit}}</td>
                <td>{{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}}ㅤㅤNDIP : {{$pedido->clientes->nro_dip}}</td>
                <td>{{$pedido->estado}}</td>
                <td>{{$pedido->fecha_entrega}}</td>
                {{-- <td>{{$pedido->fecha_entregado}}</td> --}}
                <td>{{$pedido->direccion_entrega}}</td>
                <td>{{$pedido->total}}</td>
                @if ($pedido->estado=='entregado')
                    <td>
                        <button disabled class="btn btn-success" style="color: black">Pedido Entregado</button>
                    </td>
                @endif
                @if ($pedido->estado=='produccion')
                    <td>
                        <button disabled class="btn btn-info" style="color: black">En producion</button>
                    </td>
                @endif
                @if ($pedido->estado=='espera')
                    <td style="width: 250px">
                        <form action="{{route('pedidos.destroy',$pedido->id_pedido)}}" method="POST" class="formBorrar">    
                            @csrf
                            @method('DELETE')
                            <a href="{{route('pedidos.edit',$pedido->id_pedido)}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('pedidos.ver_detalles',$pedido->id_pedido)}}" class="btn btn-info">Detalles</a>
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endif
        @endforeach
    </tbody>   
</table>