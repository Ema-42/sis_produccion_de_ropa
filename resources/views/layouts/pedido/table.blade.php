<table id="pedidos" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
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
        <th scope="col" >Descuento</th>
        <th scope="col">TOTAL</th>
        <th scope="col" style="width: 180px">Acciones</th>
    </tr>   
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
            <tr>
                <td>
                    {{$pedido->id_pedido}}
                </td>
                <td>
                   {{$pedido->users->name}} {{-- {{$pedido->usuarios->apellido_paterno}} --}}{{-- {{$pedido->users->name}} --}}
                </td>
                <td>
                    {{$pedido->empresas->nombre}}
                </td>
                <td>
                    {{$pedido->nit}}
                </td>
                <td>
                    {{$pedido->clientes->primer_nombre}} {{$pedido->clientes->apellido_paterno}}
                </td>
                <td>
                    {{$pedido->created_at}}
                </td>
                <td>
                    {{$pedido->fecha_entrega}}
                </td>
                <td>
                    {{$pedido->estado}}
                </td>
                <td>
                    {{$pedido->fecha_entregado}}
                </td>
                <td>
                    {{$pedido->comentarios}}
                </td>
                <td>
                    {{$pedido->direccion_entrega}}
                </td>
                <td>
                    {{$pedido->descuento}}
                </td>
                <td>
                    {{$pedido->total}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('pedidos.destroy',$pedido->id_pedido)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('pedidos.edit',$pedido->id_pedido)}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('pedidos.show',$pedido->id_pedido)}}" class="btn btn-info">Ver</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>   
</table>