<?php

namespace App\Http\Livewire;
use App\Models\Articulo;
use App\Models\Material;
use App\Models\Talla;
use App\Models\Detalle_pedido;

use Livewire\Component;

class DetallesPedidos extends Component
{
    public $formulario = false;

    public $items = array(
 /*        array('nombre'=>'remera','material'=>'sintetica 2','talla'=>'M','cantidad'=>'12','precio'=>'10','subtotal'=>'120','comen'=>'no detalles'),
        array('nombre'=>'campera','material'=>'sintetica 2','talla'=>'M','cantidad'=>'12','precio'=>'10','subtotal'=>'120','comen'=>'no detalles'),
        array('nombre'=>'buzo2','material'=>'sintetica 2','talla'=>'M','cantidad'=>'12','precio'=>'10','subtotal'=>'120','comen'=>'no detalles'), */
    );
    public function obtenerArray(){
        
    }
    public function render($items = 0)
    {   
        $articulos =Articulo::all();
        $materiales =Material::all();
        $tallas =Talla::all();  
        return view('livewire.detalles-pedidos',compact('articulos','materiales','tallas','items'));
    }
    public function agregarItem2(){
        $items = $this->items;
        array_push($items,array('nombre'=>'buzo4','material'=>'sintetica 2','talla'=>'M','cantidad'=>'12','precio'=>'10','subtotal'=>'120','comen'=>'no detalles'));
        $this->render($items);
        /* dd($items); */
     }
}
