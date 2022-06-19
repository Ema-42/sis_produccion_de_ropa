<table id="materiales" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre del Material</th>
        <th scope="col">Descripcion del Material</th>
        <th scope="col">Fecha creacion</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($materiales as $material)
            <tr>
                <td>
                    {{$material->id_material}}
                </td>
                <td>
                    {{$material->nombre}}
                </td>
                <td>
                    {{$material->descripcion}}
                </td>
                <td>
                    {{$material->created_at}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('materiales.destroy',$material->id_material)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('materiales.edit',$material->id_material)}}" class="btn btn-primary">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>   
</table>