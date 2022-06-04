<div>
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        <div class="flex">
            <div>
                <h4>{{ session('message')}}</h4>
            </div>
        </div>
    </div>
    @endif
    <button wire:click="crear()"  class="btn btn-success mb-4">Crear</button>
    @if($formulario)
        @include('livewire.crear-articulo')   
    @endif   
    <table id="articulos" class=" table table-striped table-hover">
        <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>{{$articulo->id_articulo}}</td>
                    <td>{{$articulo->id_categoria_articulo}}</td>
                    <td>{{$articulo->nombre}}</td>
                    <td>{{$articulo->descripcion}}</td>
                    <td>{{$articulo->imagen}}</td>
                    <td>
                        <button wire:click="editar({{$articulo->id_articulo}})"  class="btn btn-primary">Editar</button>
                        <button wire:click="borrar({{$articulo->id_articulo}})" class="btn btn-danger">Borrar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</div>
