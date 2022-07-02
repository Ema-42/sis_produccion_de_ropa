<div>
    <h4>Agrega Articulos al Pedido</h4>
     <form action="" method="POST" class="row g-3" id="form-item">
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Articulo</label><br>
                <select name="id_articulo" id="id_articulo" style="width: 250px" class="form-control select_articulos" aria-label="Default select example" tabindex="2" >
                    @foreach ($articulos as $articulo)
                        <option value="{{$articulo->id_articulo}}">{{$articulo->nombre}}</option>
                    @endforeach
                        <option selected value="">Ninguno</option>
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Material</label><br>
                <select name="id_material" id="id_material" style="width: 250px" class="form-control select_materiales" aria-label="Default select example" tabindex="2" >
                    @foreach ($materiales as $material)
                        <option value="{{$material->id_material}}">{{$material->nombre}}</option>
                    @endforeach
                        <option selected value="">Ninguno</option>
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Tallas</label><br>
                <select name="id_talla" id="id_talla" style="width: 250px" class="form-control select_tallas" aria-label="Default select example" tabindex="2" >
                    @foreach ($tallas as $talla)
                        <option value="{{$talla->id_talla}}">{{$talla->nombre}}</option>
                    @endforeach
                        <option selected value="">Ninguno</option>
                </select>
            </div>
            <div class="mb-3 col-md-1">
                <label for="" class="form-label">Cantidad</label>
                <input  id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2" value="0" min="0" >
            </div>
            <div class="mb-3 col-md-1">
                <label for="" class="form-label ">Precio Unitario</label>
                <input  id="precio_unitario" name="precio_unitario" type="number" class="form-control" tabindex="2" value="0" min="0" >
            </div>
            <div hidden class="mb-3 col-md-1">
                <label for="" class="form-label ">Sub Total</label>
                <input readonly id="sub_total" name="sub_total" type="number" class="form-control" tabindex="2" value="" min="0" >
            </div>
            <div class="mb-3 col-md-4">
                <label for="" class="form-label ">Detalles</label>
                <input id="detalles" name="detalles" type="text" class="form-control" tabindex="2" >
            </div>
            {{-- <a  wire:click="agregarItem2()"  class="btn btn-info mb-4">Agregar Articulo</a> --}}

            {{-- la funcion esta en create --}}
            <a onclick="agregarItem()"   class="btn btn-info mb-4 ml-2">Agregar Articulo</a>
            
        </form>
            <table id="detalle_pedidos" class="table table-striped table-hover">
                <thead class="bg-black text-white" >
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Material</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Quitar</th>
                </tr>
                </thead>
                <tbody id="tablaitems">
{{--                     @foreach ($items as $item)
                    <tr>
                        <td>{{$item['nombre']}}</td>
                        <td>{{$item['material']}}</td>
                        <td>{{$item['talla']}}</td>
                        <td>{{$item['cantidad']}}</td>
                        <td>{{$item['precio']}}</td>
                        <td>{{$item['subtotal']}}</td>
                        <td>{{$item['comen']}}</td>
                        <td>
                            <button class="btn btn-danger">Quitar</button>
                        </td>
                    </tr>    
                    @endforeach   --}}                 
                </tbody>   
            </table>
</div>
