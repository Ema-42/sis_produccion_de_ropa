<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Insumo;

class Insumos extends Component

{
    public $insumos;

    public function render()
    {
        $this->insumos = Insumo::all();
        return view('livewire.insumos');
    }
}
