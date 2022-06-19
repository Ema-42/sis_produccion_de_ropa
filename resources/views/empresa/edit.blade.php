@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Editar Información de Empresa</h1>
@stop

@section('content')
<form action="/empresas/{{$empresa->id_empresa}}" method="POST"  class="row g-3" >
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control " tabindex="1"  value="{{$empresa->nombre}}">
    </div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">NIT</label>
        <input id="nit" name="nit" type="text" class="form-control " tabindex="2" value="{{$empresa->nit}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Telefono</label>
        <input id="telefono" name="telefono" type="text" class="form-control " tabindex="3"  value="{{$empresa->telefono}}">
    </div>
    <div class="mb-3 col-md-2" >
        <label for="" class="form-label">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control " tabindex="4"value="{{$empresa->celular}}">
    </div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Direccion</label>
        <input id="direccion" name="direccion" type="text" class="form-control " tabindex="5" value="{{$empresa->direccion}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-4" >
        <label for="" class="form-label">Correo</label>
        <input id="correo" name="correo" type="email" class="form-control " tabindex="6" value="{{$empresa->correo}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-12" >
        <a href="/empresas" class="btn btn-secondary" tabindex="7">Cancelar</a>
        {{-- laravel ya sabe que este guardas va deriar al store del controlador de clientes --}}
        <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
    </div>
    
</form>
@include('layouts.empresa.table')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    @stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#empresas').DataTable({
        'lengthMenu':[[5,10,50,-1],[5,10,50,'All']]
    });
    })
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.formBorrar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Desea eliminado este registro?',
                    text: "esta a punto de eliminado este registro!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire(
                        'Eliminado!',
                        'El registro fue eliminado existosamente.',
                        'success'
                        )
                    }
                    })
            }, false)
            })
        })()
</script>

@stop