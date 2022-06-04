<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Insumo;

class Insumos extends Component

{
    public $insumos;
    public $formulario = false;

    public function render()
    {
        $this->insumos = Insumo::all();
        return view('livewire.insumos');
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
        $this->id_insumo='';
        $this->id_categoria_insumo = '';
        $this->nombre = '';
        $this->descripcion = '';
        $this->stock = '';
        $this->imagen = '';
    }
    public function editar($id_insumo)
    {
        $insumos = Insumo::findOrFail($id_insumo);
        $this->id_insumo = $id_insumo;
        $this->id_categoria_insumo = $insumos->id_categoria_insumo;
        $this->nombre = $insumos->nombre;
        $this->descripcion = $insumos->descripcion;
        $this->stock = $insumos->stock;
        $this->imagen = $insumos->imagen;
        $this->abrirFormulario();
    }
    public function borrar($id_insumo)
    {
        Insumo::find($id_insumo)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Insumo::updateOrCreate(['id_insumo'=>$this->id_insumo],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'id_categoria_insumo' => $this->id_categoria_insumo,
                'stock' => $this->stock,
                'imagen' => $this->imagen
            ]);
         
         session()->flash('message',
            $this->id_insumo ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarFormulario();
         $this->limpiarCampos();
    }
}
