<h1>Lista de Cotizaciones</h1>
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
                <td><span style="font-size: 16px" class="badge badge-success  d-inline">{{$cotizacion->total}}</span></td>
            </tr>
            @endif
        @endforeach
    </tbody>   
</table>