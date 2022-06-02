<?php

namespace App\Http\Livewire\CatArticulos;

use Livewire\Component;
use App\Models\Categoria_articulo;
class CategoriaArticulos extends Component
{
    public $categoria_articulos;
    public function render()
    {
        $this->categoria_articulos = Categoria_articulo::all();
        return view('livewire.cat-articulos.categoria-articulos');
    }
}
