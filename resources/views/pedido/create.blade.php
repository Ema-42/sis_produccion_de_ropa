@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Realizar Cotización</h1>
    @livewireStyles
@stop

@section('content')
<div class="card">
    
    <div class="card-body">
        <form action="/pedidos" method="POST" class="row g-3">
            @csrf
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Empresa</label>
                <select name="id_empresa" id="id_empresa" class=" form-control" aria-label="Default select example" tabindex="1">
                    @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id_empresa}}">{{$empresa->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 ">
                <label hidden for="" class="form-label ">NIT</label>
                <input hidden readonly id="nit" name="nit" type="number" class="form-control" tabindex="2"
                value=""
                >
            </div>
            <div class="mb-3 col-md-2">
                <label  for="" class="form-label">Cliente</label><br>
                <select name="id_cliente" id="id_cliente" class="form-control select_clientes" aria-label="Default select example" tabindex="2">
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id_cliente}}">{{$cliente->primer_nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}</option>
                    @endforeach
                        <option selected value="">Ninguno</option>
                  </select>
            </div>  
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Fecha de Entrega</label>
                <input required id="fecha_entrega" name="fecha_entrega" class="form-control" type="date"  min="1900-01-01" tabindex="5"/>
            </div>   
            <div class="mb-3 col-md-3">
                <label for="" class="form-label">Comentarios</label>
                <input required id="comentarios" name="comentarios" type="text" class="form-control" tabindex="3">
            </div>
          
            <div class="mb-3 col-md-3">
                <label for="" class="form-label">Direccion de entrega</label>
                <input required id="direccion_entrega" name="direccion_entrega" type="text" class="form-control" tabindex="3">
            </div>
            <div class="mb-3 mt-4 col-md-6">
                <a href="/pedidos" class="btn btn-secondary" tabindex="5" style="width: 300px ; height: 50px;">CANCELAR</a>
                {{-- laravel  sabe que este guardas va deriar al store del controlador de articulos --}}
                <button type="submit" class="btn btn-success" tabindex="6" style="width: 300px; height: 50px;">REGISTRAR PEDIDO</button>
            </div>
            <div class="mb-3 col-md-1">
                <label for="" class="form-label">TOTAL (Bs.)</label>
                <input   id="total" name="total" type="number" class="form-control" tabindex="3" style="font-size: 25px">
            </div>
            <div hidden class="mb-3 col-md-1">
                <label for="" class="form-label ">Descuento (%)</label>
                <input id="descuento" name="descuento" type="number" class="form-control" tabindex="2" value="0" min="0" max="100" style="font-size: 25px">
            </div>
        </form>
    </div>
</div>
@livewire('detalles-pedidos')


@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- select con busqueda --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
@livewireScripts
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- select con busqueda --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select_clientes').select2();
    });
</script>
<script>
    $(document).ready(function() {
    $('.select_articulos').select2();
    });
</script>
<script>
    $(document).ready(function() {
    $('.select_materiales').select2();
    });
</script>
<script>
    $(document).ready(function() {
    $('.select_tallas').select2();
    });
</script>

<script>
    function agregarItem() {
      var $select_material = document.getElementById("id_material");
      $select_material = $select_material.options[$select_material.selectedIndex].value
      var $select_articulo = document.getElementById("id_articulo");
      $select_articulo = $select_articulo.options[$select_articulo.selectedIndex].value
      var $select_tallas = document.getElementById("id_talla");
      $select_tallas = $select_tallas.options[$select_tallas.selectedIndex].value

      var $cantidad = document.getElementById("cantidad").value;
      var $precio_unitario = document.getElementById("precio_unitario").value;
      var $detalles = document.getElementById("detalles").value;
      var $sub_total = $precio_unitario*$cantidad;
      
/*       var fila = "<tr><td>"+$select_articulo+"</td><td>"+$select_material+"</td><td>"+$select_tallas+"</td><td>"+$cantidad+"</td><td>"+$precio_unitario+"</td><td>"+$sub_total+"</td><td>"+$detalles+"</td></tr>";
      var btn = document.createElement("TR");
      btn.innerHTML=fila;
      document.getElementById("tablaitems").appendChild(btn); */

      console.log($select_material,$select_articulo,$select_tallas,$cantidad,$precio_unitario,$detalles,$sub_total);
      /* document.getElementById("form-item").reset(); */
    }
</script>
@stop