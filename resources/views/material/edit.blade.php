@extends('adminlte::page')

@section('title', 'Sistema de Produccion')

@section('content_header')
    <h1>Editar Material</h1>
@stop

@section('content')
<form action="/materiales/{{$material->id_material}}" method="POST"  class="row g-3" >
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Nombre del Material</label>
        <input required id="nombre" name="nombre" type="text" class="form-control " tabindex="1" value="{{$material->nombre}}">
    </div>
    <div class="mb-3 col-md-4">
        <label for="" class="form-label">Descripcion del Material</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control " tabindex="2" value="{{$material->descripcion}}">
    </div>
    <div class="mb-3 col-md-4"></div>
    <div class="mb-3 col-md-12" >
        <a href="/materiales" class="btn btn-secondary" tabindex="3">Cancelar</a>
        {{-- laravel ya sabe que este guardas va deriar al store del controlador de clientes --}}
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </div>
</form>
{{-- @include('layouts.material.table') --}}
@stop

@section('css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#materiales').DataTable({
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