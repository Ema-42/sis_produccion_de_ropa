<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria_articulo;

class CategoriaArticulos extends Component
{
    public $categoria_articulos;
    public $formulario = false;

    public function render()
    {
        $this->categoria_articulos = Categoria_articulo::all();
        return view('livewire.categoria-articulos');
    
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirFormulario();
    }

    public function abrirFormulario() {
        $this->formulario = true;
    }
    public function cerrarFormulario() {
        $this->formulario = false;
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
        $this->abrirFormulario();
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
         
         $this->cerrarFormulario();
         $this->limpiarCampos();
    }
}
