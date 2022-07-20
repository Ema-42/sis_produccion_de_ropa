<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\Articulo;
use App\Models\Material;
use App\Models\DetalleCotizacion;

use Barryvdh\DomPDF\Facade\Pdf;




class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::all();
        return view('cotizacion.index',compact('cotizaciones'));
    }

    public function ver_detalles($id_cotizacion)
    {
        $cotizacion = Cotizacion::find($id_cotizacion);
        $detalles = DetalleCotizacion::all();
        return view('cotizacion.ver_detalles',compact('cotizacion','detalles','id_cotizacion'));
 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos =Articulo::all();
        $materiales =Material::all();

        $users =User::all();
        $empresas =Empresa::all();
        $clientes =Cliente::all();
        return view('cotizacion.create',compact('articulos','materiales','empresas','clientes','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion();
        $cotizacion->id_empresa= $request->get('id_empresa');
        $cotizacion->id_cliente= $request->get('id_cliente');
        $cotizacion->id_user=(auth()->user()->id);
        $cotizacion->fecha_entrega= $request->get('fecha_entrega');
        $cotizacion->total = $request->get('total');
        $cotizacion->estado=('espera');
        $cotizacion->comentarios= $request->get('comentarios');

        $cotizacion->save();

        /* para los detalles */
        $ultimaCotizacion = Cotizacion::latest('id_cotizacion')->first();
        if ($request['id_articulo']==null) {
            
        } else {
            for ($i=0; $i < count($request['id_articulo']) ; $i++) { 
                $detalle_cotizacion = new DetalleCotizacion();
                $detalle_cotizacion->id_cotizacion = $ultimaCotizacion->id_cotizacion;
                $detalle_cotizacion->id_articulo = $request['id_articulo'][$i];
                $detalle_cotizacion->id_material = $request['id_material'][$i];
                $detalle_cotizacion->cantidad = $request['cantidad'][$i];
                $detalle_cotizacion->precio_unitario = $request['precio_unitario'][$i];
                $detalle_cotizacion->sub_total = $request['sub_total'][$i];
                $detalle_cotizacion->detalles = $request['detalles'][$i];
                $detalle_cotizacion->descuento = $request['descuento_detalles'][$i];
                $detalle_cotizacion->save();
            }
        }
        return redirect('/cotizaciones');
    }

    public function listaReporte(Request $request)
    {   
        
        $cotizaciones = Cotizacion::all();
        $usuario = User::find((auth()->user()->id));
        $nombreUsuario = $usuario->name;

        $pdf = PDF::loadView('cotizacion.listaReporte',['cotizaciones'=>$cotizaciones,'nombreUsuario'=>$nombreUsuario]);
        return $pdf->stream();
        /* return view('cotizacion.listaReporte',compact('cotizaciones')); */
        /* return $pdf->download('cotizaciones.pdf'); */
    }
    public function detalleReporte($id_cotizacion)
    {   
        $cotizacion = Cotizacion::find($id_cotizacion);
        $detalles = DetalleCotizacion::all();
        $usuario = User::find((auth()->user()->id));
        $nombreUsuario = $usuario->name;

        $pdf = PDF::loadView('cotizacion.detalleReporte',['id_cotizacion'=>$id_cotizacion,'detalles'=>$detalles,'cotizacion'=>$cotizacion,'nombreUsuario'=>$nombreUsuario]);
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
    public function destroy($id_cotizacion)
    {
        $cotizacion=  Cotizacion::find($id_cotizacion);
        $cotizacion->estado ='eliminado';
        $cotizacion->save();
        return redirect('/cotizaciones');
    }
}
