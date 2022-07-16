<div class="mb-3 mt-3 col-md-12">
    <h4>Agrega Articulos al Pedido</h4>
</div>
<div class="mb-3 col-md-2">
    <label for="" class="form-label">Articulo</label><br>
    <select  id="id_articulo" style="width: 250px" class="form-control select_articulos  select2" aria-label="Default select example" tabindex="2" >
        @foreach ($articulos as $articulo)
            <option value="{{$articulo->id_articulo}}">{{$articulo->nombre}}</option>
        @endforeach
            {{-- <option selected value="">Ninguno</option> --}}
    </select>
</div>
<div class="mb-3 col-md-2">
    <label for="" class="form-label">Material</label><br>
    <select  {{-- name="id_material" --}} id="id_material" style="width: 250px" class="form-control select_materiales  select2" aria-label="Default select example" tabindex="2" >
        @foreach ($materiales as $material)
            <option value="{{$material->id_material}}">{{$material->nombre}}</option>
        @endforeach
            {{-- <option  selected value="">Ninguno</option> --}}
    </select>
</div>
<div class="mb-3 col-md-2">
    <label for="" class="form-label">Tallas</label><br>
    <select {{-- name="id_talla" --}} id="id_talla" style="width: 250px" class="form-control select_tallas  select2" aria-label="Default select example" tabindex="2" >
        @foreach ($tallas as $talla)
            <option value="{{$talla->id_talla}}">{{$talla->nombre}}</option>
        @endforeach
            {{-- <option selected value="">Ninguno</option> --}}
    </select>
</div>
<div class="mb-3 col-md-1">
    <label for="" class="form-label">Cantidad</label>
    <input onkeypress='return validaNumericos(event)'  id="cantidad" style="font-size: 23px"{{-- name="cantidad" --}} type="number" class="form-control" tabindex="2" value="0" min="0" >
</div>
<div class="mb-3 col-md-1">
    <label for="" class="form-label ">Precio Unitario</label>
    <input step="any" id="precio_unitario" style="font-size: 23px"{{-- name="precio_unitario" --}} type="number" class="form-control" tabindex="2" value="0" min="0" >
</div>
<div class="mb-3 col-md-1">
    <label for="" class="form-label">Descuento (%)</label>
    <input step="any" id="descuento_detalles"style="font-size: 23px" {{-- name="cantidad" --}} type="number" class="form-control" tabindex="2" value="0" min="0" max="100">
</div>
<div hidden class="mb-3 ">
    <label for="" class="form-label ">Sub Total</label>
    <input readonly id="sub_total" {{-- name="sub_total" --}} type="number" class="form-control" tabindex="2" value="" min="0" >
</div>
<div class="mb-3 col-md-2">
    <label for="" class="form-label ">Detalles</label>
    <input id="detalles" {{-- name="detalles" --}} type="text" class="form-control" tabindex="2" >
</div>
<div class=" mt-4 col-md-1">
    <a  onclick="agregarItem()"   class="btn btn-primary mb-4 ml-2 agregar">
        {{-- <span style="font-size: 18px">Agregar</span> --}}
        ㅤ<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
        </svg>ㅤ
    </a>
</div>

<div style="height: 500px !important;overflow:auto;width:1650px">

    <p style="height: 30px;background: rgb(215, 234, 255);width: 300px;border-radius: 50px">ㅤ
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
          </svg>
          ㅤPertenece a al pedido
    </p>
   
    <table id="detalle_pedidos" class="table table-striped table-hover">
        <thead class="bg-black text-white" >
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Material</th>
            <th scope="col">Talla</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Descuento (%)</th>
            <th scope="col">Sub Total</th>
            <th scope="col">Detalles</th>
            <th scope="col">Quitar</th>
        </tr>
        </thead>
        <tbody id="tablaitems">
            @foreach ($detalles as $detalle)
            @if ($detalle->id_pedido == $id_pedido)
            <tr style="background: rgb(215, 234, 255)">
                <td > <input hidden  type='number' name='id_articulo[]' value={{$detalle->id_articulo}}>{{$detalle->articulos->nombre}}</td>
                <td ><input hidden  type='number' name='id_material[]' value={{$detalle->id_material}}>{{$detalle->materiales->nombre}}</td>
                <td ><input hidden  type='number' name='id_talla[]' value={{$detalle->id_talla}}>{{$detalle->tallas->nombre}}</td></td>
                <td ><input hidden  type='number' name='cantidad[]' value={{$detalle->cantidad}}> {{$detalle->cantidad}}</td>
                <td ><input hidden  type='number' name='precio_unitario[]' value={{$detalle->precio_unitario}}> {{$detalle->precio_unitario}}</td>
                <td ><input hidden  type='number' name='descuento_detalles[]' value={{$detalle->descuento}}>{{$detalle->descuento}}</td>
                <td ><input hidden  type='number' name='sub_total[]' value={{$detalle->sub_total}}> {{$detalle->sub_total}}</td>
                <td ><input hidden  type='text' name='detalles[]' value={{$detalle->detalles}}>{{$detalle->detalles}}</td>
                <td><input type='button' value='Quitar' class='borrar btn btn-danger'></td>
            </tr>
            @endif
            @endforeach
        </tbody>   
    </table>
</div>
