<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Articulo;
use App\Models\Material;
use App\Models\Talla;
use App\Models\Detalle_pedido;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* dd(auth()->user()->id); */
        /* para los detalles */
        $articulos =Articulo::all();
        $materiales =Material::all();
        $tallas =Talla::all(); 


        $usuarios =Usuario::all();
        $users =User::all();
        $empresas =Empresa::all();
        $clientes =Cliente::all();
        return view('pedido.create',compact('articulos','materiales','tallas','usuarios','empresas','clientes','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $nit = Empresa::find($request->id_empresa);
        $pedido = new Pedido();
        $pedido->id_empresa= $request->get('id_empresa');
        $pedido->id_cliente= $request->get('id_cliente');
        $pedido->fecha_entrega= $request->get('fecha_entrega');
        $pedido->descuento= $request->get('descuento');
        $pedido->comentarios= $request->get('comentarios');
        $pedido->direccion_entrega= $request->get('direccion_entrega');
        $pedido->total = $request->get('total');
        $pedido->estado=('espera');
        $pedido->id_usuario=(1);
        $pedido->id_user=(auth()->user()->id);
        $pedido->nit = $nit->nit;
        $pedido->save();


        /* para los detalles */
        $ultimoPedido = Pedido::latest('id_pedido')->first();
        if ($request['id_articulo']==null) {
            
        } else {
            for ($i=0; $i < count($request['id_articulo']) ; $i++) { 
                $detalle_pedido = new Detalle_pedido();
                $detalle_pedido->id_pedido = $ultimoPedido->id_pedido;
                $detalle_pedido->id_articulo = $request['id_articulo'][$i];
                $detalle_pedido->id_material = $request['id_material'][$i];
                $detalle_pedido->id_talla = $request['id_talla'][$i];
                $detalle_pedido->cantidad = $request['cantidad'][$i];
                $detalle_pedido->precio_unitario = $request['precio_unitario'][$i];
                $detalle_pedido->sub_total = $request['sub_total'][$i];
                $detalle_pedido->detalles = $request['detalles'][$i];
                $detalle_pedido->descuento = $request['descuento_detalles'][$i];
                $detalle_pedido->color = 'sin definir';
                $detalle_pedido->save();
            }
        }
        
        return redirect('/pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pedido)
    {
        
    }
    public function ver_detalles($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        $detalles = Detalle_pedido::all();
        return view('pedido.ver_detalles',compact('pedido','detalles','id_pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        /* $pedidos = Pedido::all(); */
        return view('pedido.edit',compact('pedido'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pedido)
    {
        $pedido=  Pedido::find($id_pedido);
        $pedido->estado ='eliminado';
        $pedido->save();
        return redirect('/pedidos');
    }
}
