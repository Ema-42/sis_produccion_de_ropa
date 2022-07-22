<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Insumo;
use App\Models\Empresa;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\DetalleIngreso;
use Illuminate\Http\Request;
use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::all();
        return view('ingreso.index',compact('ingresos'));
    }

    public function ver_detalles($id_ingreso)
    {
        $ingreso = Ingreso::find($id_ingreso);
        $detalles = DetalleIngreso::all();
        return view('ingreso.ver_detalles',compact('ingreso','detalles','id_ingreso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos =Insumo::all();
        $empresas =Empresa::all();
        $proveedores =Proveedor::all();
        $pedidos =Pedido::all();

        return view('ingreso.create',compact('pedidos','insumos','empresas','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $ingreso = new Ingreso();
        $ingreso->id_usuario=(1);
        $ingreso->id_user=(auth()->user()->id);
        $ingreso->id_empresa= $request->get('id_empresa');
        $ingreso->id_proveedor= $request->get('id_proveedor');
        $ingreso->total = $request->get('total');
        $ingreso->comentarios = $request->get('comentarios');
        $ingreso->fecha_entrega = $request->get('fecha_entrega');
        $ingreso->id_pedido = $request->get('id_pedido');
        $ingreso->numero_comprobante = $request->get('num_comprobante');
        $ingreso->save();

        $ultimoIngreso = Ingreso::latest('id_ingreso')->first();

        if ($request['id_insumo']==null) {
            
        } else {
            for ($i=0; $i < count($request['id_insumo']) ; $i++) { 
                $detalle_ingreso = new DetalleIngreso();
                $detalle_ingreso->id_ingreso = $ultimoIngreso->id_ingreso;
                $detalle_ingreso->id_insumo = $request['id_insumo'][$i];
                $detalle_ingreso->cantidad = $request['cantidad'][$i];
                $detalle_ingreso->precio_unitario = $request['precio_unitario'][$i];
                $detalle_ingreso->sub_total = $request['sub_total'][$i];
                $detalle_ingreso->detalles = $request['detalles'][$i];
                $detalle_ingreso->descuento = $request['descuento_detalles'][$i];
                $detalle_ingreso->save();
            }
        }
        return redirect('/ingresos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ingreso)
    {
        $detalles = DetalleIngreso::all();

        $insumos =Insumo::all();
        $empresas =Empresa::all();
        $proveedores =Proveedor::all();
        $pedidos =Pedido::all();
        $ingreso = Ingreso::find($id_ingreso);
        return view('ingreso.edit',compact('ingreso','detalles','id_ingreso','insumos','empresas','proveedores','pedidos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id_ingreso)
    {
        
        $ingreso = $id_ingreso;
        $detallesEnBD=DetalleIngreso::where('id_ingreso','=',$ingreso)->get();
        $detalles = [];
        for ($i=0; $i <count($detallesEnBD) ; $i++) { 
            array_push($detalles,$detallesEnBD[$i]['id_detalle_ingreso']);
        }
        /* error cuando se borra todos los detalles qe ya tiene el pedido */
        /* TAMBIEN PASA EN PEDIDO CONTROLER/EDITARPEDIDO (SON LO MISMO) */

        $detallesActualizar = $request['id_detalle_ingreso'];
        
        if ($detallesActualizar!=null) {
            $detallesELiminar = array_diff($detalles,$detallesActualizar);
            $detallesELiminar2 = array_values($detallesELiminar);/*  reseteando keys */
        }
        else {
            $detallesELiminar = $detalles;
            $detallesELiminar2 = array_values($detallesELiminar);/*  reseteando keys */
        }
        
        if ($detallesELiminar2!=null) {
            for ($i=0; $i <count($detallesELiminar2) ; $i++) { 
                $detalle =  DetalleIngreso::find($detallesELiminar2[$i]);
                $detalle->delete();
            }
        }
        
        $ingreso =  Ingreso::find($id_ingreso);
        

        $ingreso->id_empresa= $request->get('id_empresa');
        $ingreso->id_proveedor= $request->get('id_proveedor');
        $ingreso->id_pedido= $request->get('id_pedido');
        $ingreso->id_usuario=(1);
        $ingreso->id_user=(auth()->user()->id);
        $ingreso->fecha_entrega= $request->get('fecha_entrega');
        $ingreso->comentarios= $request->get('comentarios');
        $ingreso->numero_comprobante= $request->get('num_comprobante');
        $ingreso->total = $request->get('total');
        
        $ingreso->save();
        

        if ($request['id_detalle_ingreso']!=null and count($request['id_detalle_ingreso'])>=1) {
            
            for ($i=0; $i < count($request['id_detalle_ingreso']) ; $i++) {

                $detalle_ingreso =  DetalleIngreso::find($request['id_detalle_ingreso'][$i]);

                $detalle_ingreso->id_insumo = $request['id_insumo'][$i];
                $detalle_ingreso->cantidad = $request['cantidad'][$i];
                $detalle_ingreso->precio_unitario = $request['precio_unitario'][$i];
                $detalle_ingreso->sub_total = $request['sub_total'][$i];
                $detalle_ingreso->detalles = $request['detalles'][$i];
                $detalle_ingreso->descuento = $request['descuento_detalles'][$i];
                $detalle_ingreso->save();
            }
        }
        if ($request['id_detalle_ingreso']!=null and count($request['id_detalle_ingreso'])<count($request['id_insumo'])) {
            for ($i=count($request['id_detalle_ingreso']); $i < count($request['id_insumo']) ; $i++) { 
                $detalle_ingreso = new DetalleIngreso();
                $detalle_ingreso->id_ingreso = $id_ingreso;

                $detalle_ingreso->id_insumo = $request['id_insumo'][$i];
                $detalle_ingreso->cantidad = $request['cantidad'][$i];
                $detalle_ingreso->precio_unitario = $request['precio_unitario'][$i];
                $detalle_ingreso->sub_total = $request['sub_total'][$i];
                $detalle_ingreso->detalles = $request['detalles'][$i];
                $detalle_ingreso->descuento = $request['descuento_detalles'][$i];
                $detalle_ingreso->save();
            }
        }
        if ($request['id_detalle_ingreso']==null) {
            for ($i=0; $i < count($request['id_insumo']) ; $i++) { 
                $detalle_ingreso = new DetalleIngreso();
                $detalle_ingreso->id_ingreso = $id_ingreso;

                $detalle_ingreso->id_insumo = $request['id_insumo'][$i];
                $detalle_ingreso->cantidad = $request['cantidad'][$i];
                $detalle_ingreso->precio_unitario = $request['precio_unitario'][$i];
                $detalle_ingreso->sub_total = $request['sub_total'][$i];
                $detalle_ingreso->detalles = $request['detalles'][$i];
                $detalle_ingreso->descuento = $request['descuento_detalles'][$i];
                $detalle_ingreso->save();
            }
        }        
        return redirect('/ingresos');
    }

    public function detalleReporte($id_ingreso)
    {   
        $ingreso = Ingreso::find($id_ingreso);
        $detalles = DetalleIngreso::all();
        $usuario = User::find((auth()->user()->id));
        $nombreUsuario = $usuario->name;

        $pdf = PDF::loadView('ingreso.detalleReporte',['id_ingreso'=>$id_ingreso,'ingreso'=>$ingreso,'detalles'=>$detalles,'nombreUsuario'=>$nombreUsuario]);
        return $pdf->stream();

    }

    public function listaReporte(Request $request)
    {   
        
        $ingresos = Ingreso::all();
        $usuario = User::find((auth()->user()->id));
        $nombreUsuario = $usuario->name;

        $pdf = PDF::loadView('ingreso.listaReporte',['ingresos'=>$ingresos,'nombreUsuario'=>$nombreUsuario]);
        return $pdf->stream();
        /* return view('cotizacion.listaReporte',compact('cotizaciones')); */
        /* return $pdf->download('cotizaciones.pdf'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ingreso)
    {
        $ingreso=  Ingreso::find($id_ingreso);
        $ingreso->estado ='eliminado';
        $ingreso->save();
        return redirect('/ingresos');
    }
}
