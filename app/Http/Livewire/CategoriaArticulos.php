<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria_articulo;

class CategoriaArticulos extends Component
{
    public $categoria_articulos;
    public $modal = false;
    public function render()
    {
        $this->categoria_articulos = Categoria_articulo::all();
        return view('livewire.categoria-articulos');
        /* return view('categoria_articulos.index'); */
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->nombre = '';
        $this->descripcion = '';
        $this->id_categoria_articulo = '';
    }

    public function editar($id_categoria_articulo)
    {
        $categorias = Categoria_articulo::findOrFail($id_categoria_articulo);
        $this->id_categoria_articulo = $id_categoria_articulo;
        $this->nombre = $categorias->nombre;
        $this->descripcion = $categorias->descripcion;
        $this->abrirModal();
    }

    public function borrar($id_categoria_articulo)
    {
        Categoria_articulo::find($id_categoria_articulo)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Categoria_articulo::updateOrCreate(['id_categoria_articulo'=>$this->id_categoria_articulo],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->id_categoria_articulo ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
