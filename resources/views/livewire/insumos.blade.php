<div>
    <a href="" class="btn btn-success mb-4">Crear</a>
    @include('livewire.crear-insumo')
    <table id="insumos" class=" table table-striped table-hover">
        <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($insumos as $insumo)
                <tr>
                    <td>
                        {{$insumo->id_insumo}}
                    </td>
                    <td>
                        {{$insumo->id_categoria_insumo}}
                    </td>
                    <td>
                        {{$insumo->nombre}}
                    </td>
                    <td>
                        {{$insumo->descripcion}}
                    </td>
                    <td>
                        {{$insumo->stock}}
                    </td>
                    <td>
                        {{$insumo->imagen}}
                    </td>
                    <td>
                        <form action="{{route('articulos.destroy',$insumo->id_insumo)}}" method="POST">    
                            @csrf
                            @method('DELETE')
                            <a href="/articulos/{{$insumo->id_insumo}}/edit" class="btn btn-info">Editar</a>
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</div>
