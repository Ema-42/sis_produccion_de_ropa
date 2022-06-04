<form class="row g-3">
 {{--    @csrf --}}
    <div class="col-md-3 mb-3 mr-3">
        <label for="" class="form-label">Categoria</label>
        <input id="id_categoria_articulo" name="id_categoria_articulo" type="number" class="form-control" tabindex="1" wire:model="id_categoria_articulo">
    </div>
    <div class="col-md-3 mb-3 mr-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" wire:model="nombre">
    </div>
    <div class="col-md-3 mb-3 mr-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3" wire:model="descripcion">
    </div>
    <div class="mb-3 mr-3">
        <label for="" class="form-label">Imagen</label>
        <input id="imagen" name="imagen" type="text" class="form-control" tabindex="4" wire:model="imagen">
    </div>
    <div class="col-12  mt-3 mb-3">
        <div class="d-grid gap-2 d-md-block">
            <button wire:click.prevent="guardar()" type="button" class="btn btn-primary mr-4" type="button">Guardar</button>
            <button  wire:click="cerrarFormulario()" type="button" class="btn btn-secondary" type="button">Cancelar</button>
        </div>
    </div>

</form>