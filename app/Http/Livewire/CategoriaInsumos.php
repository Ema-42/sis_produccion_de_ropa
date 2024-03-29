<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria_insumo;

class CategoriaInsumos extends Component
{
    public $categoria_insumos;
    public $formulario = false;

    public function render()
    {
        $this->categoria_insumos = Categoria_insumo::all();
        return view('livewire.categoria-insumos');
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
        $this->id_categoria_insumo = '';
    }
    public function editar($id_categoria_insumo)
    {
        $categorias = Categoria_insumo::findOrFail($id_categoria_insumo);
        $this->id_categoria_insumo = $id_categoria_insumo;
        $this->nombre = $categorias->nombre;
        $this->descripcion = $categorias->descripcion;
        $this->abrirFormulario();
    }

    public function borrar($id_categoria_insumo)
    {
        $cat_insumo = Categoria_insumo::find($id_categoria_insumo);
        if ($cat_insumo->estado=='vigente') {
            $cat_insumo->estado = 'eliminado';
            $cat_insumo->save();
        } else {
            $cat_insumo->estado = 'vigente';
            $cat_insumo->save();
        }
        session()->flash('message', 'Registro modificado correctamente');
    }

    public function guardar()
    {

        $validatedData = $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            ]);

        Categoria_insumo::updateOrCreate(['id_categoria_insumo'=>$this->id_categoria_insumo],
            [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion
            ]);
         
         session()->flash('message',
            $this->id_categoria_insumo ? '¡Actualización exitosa!' : '¡Alta Exitosa!');
         
         $this->cerrarFormulario();
         $this->limpiarCampos();
    }
}
