<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Articulo;
use App\Models\Pedido;
use App\Models\Insumo;

class HomeController extends Controller
{

    public function index(){
        $clientes = count(Cliente::all());
        $articulos = count(Articulo::all());
        $insumos = count(Insumo::all());
        $num_pedidos = count(Pedido::all());
        $pedidos = Pedido::all();
        
        for ($i=0; $i <count($pedidos) ; $i++) { 
            if ($pedidos[$i]['fecha_entregado']!=null) {
                if ($i==1) {
                    $piv = $pedidos[$i]['fecha_entregado'];
                }
                if ($piv<$pedidos[$i]['fecha_entregado']) {
                    $piv = $pedidos[$i]['fecha_entregado'];
                    $id_cliente = $pedidos[$i]['id_cliente'];
                    $in = $i;
                }
            }
        }
        $fecha_UltPedido=$piv;
        
        $cliente = Cliente::find($id_cliente);
        $nombre = $cliente->primer_nombre ;
        $ap_paterno = $cliente->apellido_paterno; 
        $ap_materno = $cliente->apellido_materno;
        return view('admin.index',compact('insumos','nombre','ap_paterno','ap_materno','fecha_UltPedido','clientes','articulos','num_pedidos'));
    }
}
