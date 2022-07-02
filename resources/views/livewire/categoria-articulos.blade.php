<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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
            @include('livewire.crear-categoria-articulos')   
         @endif   
        <table id="categoria_articulos" class=" table table-striped table-hover" >
            <thead class="bg-secondary text-white">
                <tr>
                    <th scope="col"  ">ID</th>
                    <th  scope="col"  ">Nombre</th>
                    <th  scope="col"  ">Descripcion</th>
                    <th scope="col"">ACCIONES</th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria_articulos as $categoria)
                <tr>
                    <td>{{$categoria->id_categoria_articulo}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td>
                        <button wire:click="editar({{$categoria->id_categoria_articulo}})"  class="btn btn-primary">Editar</button>
                        <button wire:click="borrar({{$categoria->id_categoria_articulo}})" class="btn btn-danger">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>