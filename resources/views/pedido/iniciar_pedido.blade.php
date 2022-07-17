@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Iniciar el Pedido</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body mb-4">
      {{-- <h4>Datos de Cotizacion</h4> --}}
      <form action="/pedidos/guardar_pedido" method="POST" class="row g-3 formRegistrar">
        @csrf
        @include('layouts.pedido.form_datos_pedido')
    
        @include('layouts.pedido.form_detalles2')
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
              <input hidden type="text" name="modal" value="3">
              <input hidden type="number" name="id_cotizacion" value="{{$cotizacion->id_cotizacion}}">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- select con busqueda --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
    $('.select2').select2();
    actualizarTotal();
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
                    title: '¿Desea registrar el Pedido?',
                    text: "esta a punto de registrar un pedido!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Registrado!',
                        'El pedido fue registrado existosamente.',
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
      
      var $select_talla = document.getElementById("id_talla");
      $textoTalla = $select_talla.options[$select_talla.selectedIndex].innerHTML
      $idTalla = $select_talla.options[$select_talla.selectedIndex].value

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
            "</td><td> <input hidden  type='number' name='id_talla[]' value="+$idTalla+"> "+$textoTalla+
            "</td><td> <input hidden  type='number' name='cantidad[]' value="+$cantidad+"> "+$cantidad+
            "</td><td> <input hidden  type='number' name='precio_unitario[]' value="+$precio_unitario+"> "+$precio_unitario+
            "</td><td> <input hidden  type='number' name='descuento_detalles[]' value="+$descuento+"> "+$descuento+
            "</td><td> <input hidden  type='number' name='sub_total[]' value="+$sub_total+"> "+$sub_total+
            "</td><td> <input hidden  type='text' name='detalles[]' value='"+$detalles+"'> "+$detalles+
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
        $('#detalle_pedidos tbody').find('tr').each(function (i, el) {
        //Voy incrementando las variables segun la fila ( .eq(5) representa la fila 5 )     
        total_col += parseFloat($(this).find('td').eq(6).text());});
        total_col = Number(total_col.toFixed(2));
        var $total_pedido = document.getElementById("total");
        $total_pedido.value=total_col;
    }

    $(document).on('click', '.borrar', function(event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        actualizarTotal();
    });

    $(document).on('click', '.agregar', function(event){
        actualizarTotal();
    });

    /* impidiendo que se envie un pedido sin detalles */
    function impedirRegistroPedido() {
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

            alert('Debe asiganar detalles al pedido');
            event.preventDefault()
        }    
    }
    /* accionar  con click */
    $(document).on('click', '.registrar_pedido', function(event){
        if (impedirRegistroPedido()==1) {
        }
    });

</script>
@stop