<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Articulo;

class Articulos extends Component
{
    public $articulos;
    public $formulario = false;
    public function render()
    {
        $this->articulos = Articulo::all();
        return view('livewire.articulos');
        
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirFormulario();
    }

    public function abrirFormulario() {
        $this->formulario = true;
    }
    public function cerrarformulario() {
        $this->formulario = false;
    }
    public function limpiarCampos(){
        $this->id_articulo = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->id_categoria_articulo = '';
        $this->imagen = '';
    }
    public function editar($id_articulo)
    {
        $articulos = Articulo::findOrFail($id_articulo);
        $this->id_articulo = $id_articulo;
        $this->nombre = $articulos->nombre;
        $this->descripcion = $articulos->descripcion;
        $this->id_categoria_articulo = $articulos->id_categoria_articulo;
        $this->imagen = $articulos->imagen;
        $this->abrirFormulario();
    }
    public function borrar($id_articulo)
    {
        Articulo::find($id_articulo)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }
    public function guardar()
    {
        Articulo::updateOrCreate(['id_articulo'=>$this->id_articulo],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'id_categoria_articulo' => $this->id_categoria_articulo,
                'imagen' => $this->imagen
            ]);
         
         session()->flash('message',
            $this->id_articulo ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarFormulario();
         $this->limpiarCampos();
    }

}
