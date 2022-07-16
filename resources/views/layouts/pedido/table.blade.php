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
                    <td style="width: 340px">
                        <form action="{{route('pedidos.destroy',$pedido->id_pedido)}}" method="POST" class="formBorrar">    
                            @csrf
                            @method('DELETE')
                            <a href="{{route('pedidos.edit',$pedido->id_pedido)}}" class="btn btn-primary">Editar</a>
                            <a target="_blank" href="{{route('pedidos.detalleReporte',$pedido->id_pedido)}}" class="btn" style="background: rgb(156, 39, 39); color: white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
                                </svg>
                                Imprimir</a>
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