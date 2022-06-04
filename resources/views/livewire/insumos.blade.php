<div>
    <button wire:click="crear()"   class="btn btn-success mb-4">Crear</button>
    @if($formulario)
        @include('livewire.crear-insumo')
    @endif  
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
                    <td>{{$insumo->id_insumo}}</td>
                    <td>{{$insumo->id_categoria_insumo}} </td>
                    <td>{{$insumo->nombre}}</td>
                    <td>{{$insumo->descripcion}}</td>
                    <td>{{$insumo->stock}}</td>
                    <td>{{$insumo->imagen}}</td>
                    <td>
                        <button wire:click="editar({{$insumo->id_insumo}})"  class="btn btn-primary">Editar</button>
                        <button wire:click="borrar({{$insumo->id_insumo}})" class="btn btn-danger">Borrar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</div>
