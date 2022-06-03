<div>
    <div>
        @if(session()->has('message'))
        <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    <h4>{{ session('message')}}</h4>
                </div>
            </div>
        </div>
    @endif
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3">Crear</button>
        @if($formulario)
            @include('livewire.crear-categoria-insumos')   
         @endif   
        <table class="table-fixed w-full " >
            <thead>
                <tr class="bg-cyan-500 text-white">
                    <th class="px-4 py-2  ">ID</th>
                    <th  class="px-4 py-2  ">Nombre</th>
                    <th  class="px-4 py-2  ">Descripcion</th>
                    <th class="px-4 py-2">ACCIONES</th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria_insumos as $categoria)
                <tr>
                    <td class="boder px-4 py-2 border ">{{$categoria->id_categoria_insumo}}</td>
                    <td class="boder px-4 py-2 border ">{{$categoria->nombre}}</td>
                    <td class="boder px-4 py-2 border ">{{$categoria->descripcion}}</td>
                    <td class="border px-4 py-2 text-center">
                        <button wire:click="editar({{$categoria->id_categoria_insumo}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                        <button wire:click="borrar({{$categoria->id_categoria_insumo}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>