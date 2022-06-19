<table id="tallas" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Fecha creacion</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($tallas as $talla)
            <tr>
                <td>
                    {{$talla->id_talla}}
                </td>
                <td>
                    {{$talla->nombre}}
                </td>
                <td>
                    {{$talla->descripcion}}
                </td>
                <td>
                    {{$talla->created_at}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('tallas.destroy',$talla->id_talla)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('tallas.edit',$talla->id_talla)}}" class="btn btn-primary">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>   
</table>