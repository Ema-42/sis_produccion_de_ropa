<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoProduccion;
use App\Models\Encargado_Produccion;
use App\Models\Pedido;
use App\Models\Talla;
use App\Models\Material;
use App\Models\Detalle_pedido;


use Illuminate\Support\Facades\DB;


class PedidoProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producciones = PedidoProduccion::all();
        $pedidos = Pedido::all();
        return view('produccion.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function asignar($id_pedido)
    {   $tallas= Talla::all();
        $materiales= Material::all();
        $detalles = Detalle_pedido::all();
        $producciones = PedidoProduccion::all();
        $encargados = Encargado_Produccion::all();
        $pedido = Pedido::find($id_pedido);
        return view('produccion.asignar',compact('pedido','materiales','tallas','id_pedido','detalles','producciones','encargados'));
    }

    public function sin_asignar()
    {
        $producciones = PedidoProduccion::all();
        $detalles = Detalle_pedido::all();
        $pedidos = Pedido::all();

        //solo se toma los pedidos que tienen detalles
        $nuevo = array();
        foreach ($pedidos as $pedido) {
            foreach ($detalles as $detalle) {
                foreach ($producciones as $produccion) {
                    if ($pedido->id_pedido == $detalle->id_pedido) {
                        if ($produccion->id_detalle_pedido ==$detalle->id_detalle_pedido) {
                        }
                        else {
                            if (in_array($pedido,$nuevo)==false) {
                                array_push($nuevo,$pedido);
                            }
                        }
                    }  
                }
            }
        }
        $pedidos = $nuevo;
        return view('produccion.sin_asignar',compact('pedidos','detalles','producciones'));
    }
    public function produciendo()
    {
        $producciones = PedidoProduccion::all();
        $detalles = Detalle_pedido::all();
        $pedidos = Pedido::all();

        $nuevo = array();
        foreach ($pedidos as $pedido) {
            foreach ($detalles as $detalle) {
                foreach ($producciones as $produccion) {
                    if ($pedido->id_pedido == $detalle->id_pedido) {
                        if ($produccion->id_detalle_pedido ==$detalle->id_detalle_pedido) {
                            if (in_array($pedido,$nuevo)==false) {
                                array_push($nuevo,$pedido);
                            }
                        }
                    }  
                }
            }
        }
        $pedidos = $nuevo;
        /* dd($nuevo[0]['id_pedido']); */
        return view('produccion.produciendo',compact('pedidos','detalles','producciones'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i=0; $i < count($request['id_detalle_pedido']) ; $i++) { 
            $pedido_produccion = new PedidoProduccion();
            $pedido_produccion->id_detalle_pedido = $request['id_detalle_pedido'][$i];
            $pedido_produccion->id_encargado_produccion = $request['id_encargado_produccion'][$i];
            $pedido_produccion->fecha_entrega = $request['fecha_entrega'];
            $pedido_produccion->save();
        }
        return redirect('/produccion');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
