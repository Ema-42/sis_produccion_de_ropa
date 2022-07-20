<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoProduccion;
use App\Models\Encargado_Produccion;
use App\Models\Pedido;
use App\Models\Talla;
use App\Models\Material;
use App\Models\User;
use App\Models\Detalle_pedido;

use Barryvdh\DomPDF\Facade\Pdf;

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
    public function entregados()
    {
        $producciones = PedidoProduccion::all();
        $pedidos = Pedido::all();
        return view('produccion.entregados',compact('pedidos'));
    }
    public function entregar($id_pedido)
    {
        $fecha_actual = date('Y-m-d H:i:s');

        $pedido=  Pedido::find($id_pedido);
        $pedido->estado ='entregado';
        $pedido->fecha_entregado = $fecha_actual;
        $pedido->save();
        return redirect('/produccion/produciendo');
    }

    public function ver_detalles($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        $detalles = Detalle_pedido::all();
        return view('produccion.ver_detalles',compact('pedido','detalles','id_pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function ver_asignaciones($id_pedido)
    {   $tallas= Talla::all();
        $materiales= Material::all();
        $detalles = Detalle_pedido::all();
        $producciones = PedidoProduccion::all();
        $encargados = Encargado_Produccion::all();
        $pedido = Pedido::find($id_pedido);
        return view('produccion.ver_asignaciones',compact('pedido','materiales','tallas','id_pedido','detalles','producciones','encargados'));
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

        $pedidosSinAsignar=Pedido::where('estado','=','espera')->get();
        $pedidos = $pedidosSinAsignar;
        
        $listaIdPedidosEnEspera =[];
        for ($i=0; $i <count($pedidos) ; $i++) { 
            array_push($listaIdPedidosEnEspera,$pedidos[$i]['id_pedido']);
        }
        $detalles2 = [];
        for ($i=0; $i <count($detalles) ; $i++) { 
            if (Pedido::find($detalles[$i]['id_pedido'])['estado'] =='espera') {
                array_push($detalles2,$detalles[$i]);
            }
        }
        /* dd($detalles2); */
        $detalles = $detalles2;
        /* dd(count($listaIdPedidosEnEspera),$listaIdPedidosEnEspera); */


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
        /* en [0] esta el array con todos los pedidos */
        $pedidos = array($pedidos->all());/*  transformando el obj a array */
        $pedidos = array_diff($pedidos[0],$nuevo);
        return view('produccion.sin_asignar',compact('pedidos','detalles','producciones'));
    }
    public function produciendo()
    {
        $producciones = PedidoProduccion::all();
        $detalles = Detalle_pedido::all();
        $pedidos = Pedido::all();

        

        $pedidosProduciendo=Pedido::where('estado','=','produccion')->get();
        $pedidos = $pedidosProduciendo;

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
        $id_pedido = $request['id_pedido'];
        $pedido = Pedido::find($id_pedido);
        
        if ($request['id_detalle_pedido']==null) {
            return redirect('/produccion/sin_asignar');
        } else {
            $pedido->estado='produccion';
            $pedido->save();
            for ($i=0; $i < count($request['id_detalle_pedido']) ; $i++) { 
                $pedido_produccion = new PedidoProduccion();
                $pedido_produccion->id_detalle_pedido = $request['id_detalle_pedido'][$i];
                $pedido_produccion->id_encargado_produccion = $request['id_encargado_produccion'][$i];
                $pedido_produccion->fecha_entrega = $request['fecha_entrega'];
                $pedido_produccion->save();
            }
            return redirect('/produccion');
        }
        

        
    }


    public function detalleReporte($id_pedido)
    {   
        $tallas= Talla::all();
        $materiales= Material::all();
        $detalles = Detalle_pedido::all();
        $producciones = PedidoProduccion::all();
        $encargados = Encargado_Produccion::all();
        $pedido = Pedido::find($id_pedido);
        
        $usuario = User::find((auth()->user()->id));
        $nombreUsuario = $usuario->name;

        $pdf = PDF::loadView('produccion.detalleReporte',['tallas'=>$tallas,'materiales'=>$materiales,'producciones'=>$producciones,'encargados'=>$encargados,'id_pedido'=>$id_pedido,'detalles'=>$detalles,'pedido'=>$pedido,'nombreUsuario'=>$nombreUsuario]);
        return $pdf->stream();

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
    public function edit($id_pedido)
    {
        $tallas= Talla::all();
        $materiales= Material::all();
        $detalles = Detalle_pedido::all();
        $producciones = PedidoProduccion::all();
        $encargados = Encargado_Produccion::all();
        $pedido = Pedido::find($id_pedido);
        return view('produccion.edit',compact('pedido','materiales','tallas','id_pedido','detalles','producciones','encargados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pedido)
    {
        /* dd($request); */
        for ($i=0; $i < count($request['id_detalle_pedido']) ; $i++) { 
            /* $pedido_produccion = new PedidoProduccion(); */
            $pedido_produccion = PedidoProduccion::find($request['id_detalle_pedido'][$i]);
            $pedido_produccion->id_encargado_produccion = $request['id_encargado_produccion'][$i];
            $pedido_produccion->save();
        }
        return redirect('/produccion/produciendo');
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
