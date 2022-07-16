<div class="mb-3 mt-4 col-md-12">
    <h4>Agrega Articulos a la Cotizacion</h4>
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
<div hidden class="mb-3 col-md-1">
    <label for="" class="form-label ">Sub Total</label>
    <input readonly id="sub_total" {{-- name="sub_total" --}} type="number" class="form-control" tabindex="2" value="" min="0" >
</div>
<div class="mb-3 col-md-5">
    <label for="" class="form-label ">Detalles</label>
    <input id="detalles" {{-- name="detalles" --}} type="text" class="form-control" tabindex="2" >
</div>
<div class="mb-3 col-md-3">
    <a  onclick="agregarItem()"   class="btn btn-primary mb-4 ml-2 agregar" style="width: 300px">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
          </svg>
          ㅤAgregar Articulo </a>
</div>

<table id="detalle_cotizacion" class="table table-striped table-hover">
    <thead class="bg-black text-white" >
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Material</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Descuento (%)</th>
        <th scope="col">Sub Total</th>
        <th scope="col">Detalles</th>
        <th scope="col">Quitar</th>
    </tr>
    </thead>
    <tbody id="tablaitems">
    </tbody>   
</table>
