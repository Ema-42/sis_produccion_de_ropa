@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    @livewireStyles
@stop

@section('content')
<div class="card" id="maincard">
    
    <div class="card-body">
        <form action="/cotizaciones" method="POST" class="row g-3 formRegistrar">
            @csrf
            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Empresa</label>
                <select required name="id_empresa" id="id_empresa" class=" form-control" aria-label="Default select example" tabindex="1">
                    @foreach ($empresas as $empresa)
                        @if ($empresa->estado=='vigente')
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
                <select required name="id_cliente" id="id_cliente" class="form-control select_clientes  select2" aria-label="Default select example" tabindex="2">
                    @foreach ($clientes as $cliente)
                        @if ($cliente->estado=='vigente')
                            <option value="{{$cliente->id_cliente}}">{{$cliente->primer_nombre}} {{$cliente->apellido_paterno}} {{$cliente->apellido_materno}}ㅤㅤNDIP: {{$cliente->nro_dip}}</option>
                        @endif
                    @endforeach
                        {{-- <option selected value="">Ninguno</option> --}}
                </select>
            </div>



            <div class="mb-3 col-md-1.5">
                <label  for="" class="form-label">Añadir</label><br>
                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Nuevo Cliente</button>
            </div>



            <div class="mb-3 col-md-2">
                <label for="" class="form-label">Fecha de Entrega</label>
                <input required id="fecha_entrega" name="fecha_entrega" class="form-control" type="date"  min="1900-01-01" tabindex="5"/>
            </div>   
            <div class="mb-3 col-md-2">
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
                <button type="submit" class="btn btn-success registrar_cotizacion" tabindex="6" style="width: 300px; height: 50px;">
                    REGISTRAR COTIZACIONㅤㅤ
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
            
            @include('layouts.cotizacion.form_detalles')
        </form>
    </div>
</div>

<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/clientes" method="POST">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">* Primer Nombre:</label>
              <input required id="primer_nombre" name="primer_nombre" type="text" class="form-control">
              <label for="recipient-name" class="col-form-label">Segundo Nombre:</label>
              <input  id="segundo_nombre" name="segundo_nombre" type="text" class="form-control">
              <label for="recipient-name" class="col-form-label">* Apellido Paterno:</label>
              <input required id="apellido_paterno" name="apellido_paterno" type="text" class="form-control">
              <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
              <input  id="apellido_materno" name="apellido_materno" type="text" class="form-control">
              <label for="recipient-name" class="col-form-label">Fecha de Naciemiento:</label>
              <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" type="date"  min="1900-01-01" tabindex="5"/>
              <label for="recipient-name" class="col-form-label">Sexo:</label>
              <select class="form-control" id="sexo" name="sexo">
                <option selected value="m">Masculino</option>
                <option value="f">Femenino</option>
              </select>
              <label for="recipient-name" class="col-form-label">* Celular:</label>
              <input required id="celular" name="celular" type="text" class="form-control">
              <label for="recipient-name" class="col-form-label">* NDIP:</label>
              <input required id="nro_dip" name="nro_dip" type="text" class="form-control ">
              <label for="recipient-name" class="col-form-label">Direccion:</label>
              <input id="direccion" name="direccion" type="text" class="form-control " tabindex="11">
              <br>
              <input hidden type="text" name="modal" value="2">
              <input disabled id="created_at" name="created_at" class="form-control" type="date"  min="1900-01-01"  value="{{date('Y-m-d')}}"tabindex="12"/>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- select con busqueda --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('js')
@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- select con busqueda --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
    });
</script>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.formRegistrar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Desea registrar la cotización?',
                    text: "esta a punto de registrar una cotización!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Registrada!',
                        'La cotización fue registrada existosamente.',
                        'success'
                        )
                    }
                    })
            }, false)
            })
        })()

</script>

<script>
    function agregarItem() {
      var $select_material = document.getElementById("id_material");
      $textoMaterial = $select_material.options[$select_material.selectedIndex].innerHTML
      $idMaterial = $select_material.options[$select_material.selectedIndex].value
      
      var $select_articulo = document.getElementById("id_articulo");
      $textoArticulo = $select_articulo.options[$select_articulo.selectedIndex].innerHTML
      $idArticulo = $select_articulo.options[$select_articulo.selectedIndex].value
      

      var $cantidad = document.getElementById("cantidad").value;
      let $descuento = document.getElementById("descuento_detalles").value;
      var $precio_unitario = document.getElementById("precio_unitario").value;
      var $detalles = document.getElementById("detalles").value;

      if ($descuento=='' || $descuento<0) {
        $descuento =0
      }
      if ($descuento>100) {
        $descuento =100
      }
      if ($detalles=='') {
        $detalles ='sinㅤdetalles';
      }

      let $sub_total = $precio_unitario*$cantidad;
      $sub_total = $sub_total-($sub_total*($descuento/100))
      $sub_total = Number($sub_total.toFixed(2));

      if($cantidad<=0 || $precio_unitario<=0){
        Swal.fire({
        icon: 'warning',
        title: 'Revise los campos...',
        text: 'La cantidad debe ser diferente de 0 y digite un precio unitario valido :)',
        })
        return 0;
      }
      var fila = "<tr> <td><input hidden type='number' name='id_articulo[]' value="+$idArticulo+"> "+$textoArticulo+
        "</td><td> <input  hidden type='number' name='id_material[]' value="+$idMaterial+"> "+$textoMaterial+
            "</td><td> <input hidden  type='number' name='cantidad[]' value="+$cantidad+"> "+$cantidad+
            "</td><td> <input hidden  type='number' name='precio_unitario[]' value="+$precio_unitario+"> "+$precio_unitario+
            "</td><td> <input hidden  type='number' name='descuento_detalles[]' value="+$descuento+"> "+$descuento+
            "</td><td> <input hidden  type='number' name='sub_total[]' value="+$sub_total+"> "+$sub_total+
            "</td><td> <input style='width: 450px' type='text' name='detalles[]' value='"+$detalles+"'> "/* +$detalles */+
            "</td><td><input type='button' value='Quitar' class='borrar btn btn-danger'></td></tr>";

      var btn = document.createElement("TR");
      btn.innerHTML=fila;
      document.getElementById("tablaitems").appendChild(btn);      
    }

    /* input cantidad de solo numeros */
    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
        return true;
        }
        return false;        
    }
    function actualizarTotal() {
        var total_col = 0;
        //Recorro todos los tr ubicados en el tbody
        $('#detalle_cotizacion tbody').find('tr').each(function (i, el) {
        //Voy incrementando las variables segun la fila ( .eq(5) representa la fila 5 )     
        total_col += parseFloat($(this).find('td').eq(5).text());});
        total_col = Number(total_col.toFixed(2));
        var $total_cotizacion = document.getElementById("total");
        $total_cotizacion.value=total_col;
    }

    $(document).on('click', '.borrar', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        actualizarTotal();
    });

    $(document).on('click', '.agregar', function(event){
        actualizarTotal();
    });
    /* impidiendo que se envie una cotizacion sin detalles */
    function impedirRegistroCotizacion() {
        var $comentarios = document.getElementById("comentarios").value
        var $direccion_entrega = document.getElementById("direccion_entrega").value
        var $fecha_entrega = document.getElementById("fecha_entrega").value
        var $total = document.getElementById("total").value
        if ($fecha_entrega=='') {
            return 1;
        }
        let date = new Date();
        let fechaActual = date.getFullYear() + '-' +String(date.getMonth() + 1).padStart(2, '0')+'-' +  String(date.getDate()).padStart(2, '0');
        
        if ($fecha_entrega<fechaActual) {
            alert('La fecha no debe ser anterior a la actual');
            event.preventDefault()
        }

        if ($total == 0) {

            alert('Debe asiganar detalles a la cotizacion');
            event.preventDefault()
        }    
    }
    /* accionar  con click */
    $(document).on('click', '.registrar_cotizacion', function(event){
        if (impedirRegistroCotizacion()==1) {
        }        
    });

</script>


@stop