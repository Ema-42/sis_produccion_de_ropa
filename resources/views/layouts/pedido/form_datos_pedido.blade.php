<div class="mb-3 col-md-2">
    <label for="" class="form-label">Empresa</label>
    <select name="id_empresa" id="id_empresa" class=" form-control" aria-label="Default select example" tabindex="1">
        @foreach ($empresas as $empresa)
            @if ($empresa->id_empresa==$cotizacion->id_empresa)
            <option selected value="{{$empresa->id_empresa}}">{{$empresa->nombre}}</option>
            @else
            <option value="{{$empresa->id_empresa}}">{{$empresa->nombre}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="mb-3 ">
    <label hidden for="" class="form-label ">NIT</label>
    <input hidden readonly id="nit" name="nit" type="number" class="form-control" tabindex="2" value="">
</div>
<div class="mb-3 col-md-3">
    <label  for="" class="form-label">Cliente</label><br>
    <select name="id_cliente" id="id_cliente" class="form-control select_clientes  select2" aria-label="Default select example" tabindex="2">
        @foreach ($clientes as $cliente)
            @if ($cliente->id_cliente==$cotizacion->id_cliente)
                <option selected value="{{$cliente->id_cliente}}">{{$cliente->primer_nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}ㅤㅤNDIP: {{$cliente->nro_dip}}</option>  
            @else
                <option value="{{$cliente->id_cliente}}">{{$cliente->primer_nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}ㅤㅤNDIP: {{$cliente->nro_dip}}</option>
            @endif
        @endforeach
            
    </select>
</div>

{{-- <div class="mb-3 col-md-1.5">
    <label  for="" class="form-label">Añadir</label><br>
    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Nuevo Cliente</button>
</div> --}}

<div class="mb-3 col-md-2">
    <label for="" class="form-label">Fecha de Entrega</label>
    <input required id="fecha_entrega" value="{{$cotizacion->fecha_entrega}}" name="fecha_entrega" class="form-control" type="date"  min="1900-01-01" tabindex="5"/>
</div>   
<div class="mb-3 col-md-3">
    <label for="" class="form-label">Comentarios</label>
    <input  id="comentarios" name="comentarios" type="text" class="form-control" tabindex="3">
</div>
<div class="mb-3 col-md-2">
    <label for="" class="form-label">Direccion de entrega</label>
    <input  id="direccion_entrega" name="direccion_entrega" type="text" class="form-control" tabindex="3">
</div>
<div class="mb-3 mt-4 col-md-6">
    <a href="/cotizaciones" class="btn btn-secondary" tabindex="5" style="width: 300px ; height: 50px;">CANCELAR
    </a>
    {{-- laravel  sabe que este guardas va deriar al store del controlador de articulos --}}
    <button type="submit" class="btn btn-success registrar_pedido" tabindex="6" style="width: 300px; height: 50px;">
        REGISTRAR PEDIDOㅤㅤ
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-plus-fill" viewBox="0 0 16 16">
            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0z"/>
            </svg>
        </button>
</div>

<div hidden class="mb-3 col-md-1">
    <label for="" class="form-label ">Descuento (%)</label>
    <input id="descuento" name="descuento" type="number" class="form-control" tabindex="2" value="0" min="0" max="100" style="font-size: 25px">
</div>
<div class="mb-3 col-md-1">
    <label for="" class="form-label" style="font-size: 20px ; width: 200px">Total (Bs.)</label>
    <input readonly value="0"  id="total" name="total" type="number" class="form-control" tabindex="3" style="font-size: 25px; width: 200px">
</div>
        