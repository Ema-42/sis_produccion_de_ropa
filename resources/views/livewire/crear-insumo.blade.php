  
<form class="row g-3">

  <div class="col-md-4">
      <label class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" wire:model="nombre">
  </div>
  <div class="col-md-4">
      <label class="form-label">Descripcion</label>
      <input type="text" class="form-control" id="descripcion" wire:model="descripcion">
  </div>
  <div class="col-md-4">
    <label class="form-label">Categoria</label>
    <input type="number" class="form-control" id="id_categoria_insumo" wire:model="id_categoria_insumo">
  </div>
  <div class="col-md-4">
    <label class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" wire:model="stock">
  </div>
  <div class="col-md-4">
    <label class="form-label">Imagen</label>
    <input type="text" class="form-control" id="imagen" wire:model="imagen">
  </div>

  <div class="col-12  mt-3 mb-3">
      <div class="d-grid gap-2 d-md-block">
          <button wire:click.prevent="guardar()" type="button" class="btn btn-primary mr-4" type="button">Guardar</button>
          <button  wire:click="cerrarFormulario()" type="button" class="btn btn-secondary" type="button">Cancelar</button>
      </div>
  </div>

</form>

