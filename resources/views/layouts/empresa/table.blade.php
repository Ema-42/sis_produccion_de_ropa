<table id="empresas" class="table table-striped table-hover">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">NIT</th>
        <th scope="col">Telefono</th>
        <th scope="col">Celular</th>
        <th scope="col">Direccion</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha creacion</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>
                    {{$empresa->id_empresa}}
                </td>
                <td>
                    {{$empresa->nombre}}
                </td>
                <td>
                    {{$empresa->nit}}
                </td>
                <td>
                    {{$empresa->telefono}}
                </td>
                <td>
                    {{$empresa->celular}}
                </td>
                <td>
                    {{$empresa->direccion}}
                </td>
                <td>
                    {{$empresa->correo}}
                </td>
                <td>
                    {{$empresa->created_at}}
                </td>
                <td style="width: 180px">
                    <form action="{{route('empresas.destroy',$empresa->id_empresa)}}" method="POST" class="formBorrar">    
                        @csrf
                        @method('DELETE')
                        <a href="{{route('empresas.edit',$empresa->id_empresa)}}" class="btn btn-primary">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>   
</table>