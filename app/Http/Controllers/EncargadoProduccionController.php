<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado_Produccion;

class EncargadoProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encargados = Encargado_Produccion::all();
        return view('encargado_produccion.index',compact('encargados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('encargado_produccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encargado_produccion= new Encargado_Produccion();
        $encargado_produccion->primer_nombre = $request->get('primer_nombre');
        $encargado_produccion->segundo_nombre = $request->get('segundo_nombre');
        $encargado_produccion->apellido_paterno = $request->get('apellido_paterno');
        $encargado_produccion->apellido_materno = $request->get('apellido_materno');
        $encargado_produccion->telefono = $request->get('telefono');
        $encargado_produccion->celular = $request->get('celular');
        $encargado_produccion->nro_dip = $request->get('nro_dip');
        $encargado_produccion->correo = $request->get('correo');
        $encargado_produccion->fecha_nacimiento = $request->get('fecha_nacimiento');
        $encargado_produccion->direccion = $request->get('direccion');

        $encargado_produccion->save();
        return redirect('/encargado_producciones');
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
    public function edit($id_encargado_produccion)
    {
        $encargado = Encargado_Produccion::find($id_encargado_produccion);
        return view('encargado_produccion.edit',compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_encargado_produccion)
    {
        $encargado_produccion=  Encargado_Produccion::find($id_encargado_produccion);
        $encargado_produccion->primer_nombre = $request->get('primer_nombre');
        $encargado_produccion->segundo_nombre = $request->get('segundo_nombre');
        $encargado_produccion->apellido_paterno = $request->get('apellido_paterno');
        $encargado_produccion->apellido_materno = $request->get('apellido_materno');
        $encargado_produccion->telefono = $request->get('telefono');
        $encargado_produccion->celular = $request->get('celular');
        $encargado_produccion->nro_dip = $request->get('nro_dip');
        $encargado_produccion->correo = $request->get('correo');
        $encargado_produccion->fecha_nacimiento = $request->get('fecha_nacimiento');
        $encargado_produccion->direccion = $request->get('direccion');

        $encargado_produccion->save();
        return redirect('/encargado_producciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_encargado_produccion)
    {
        $encargado_produccion = Encargado_Produccion::find($id_encargado_produccion);
        
        if ($encargado_produccion->estado=='vigente') {
            $encargado_produccion->estado='eliminado';
            $encargado_produccion->save();
        } else {
            $encargado_produccion->estado='vigente';
            $encargado_produccion->save();
        }
    
        return redirect('/encargado_producciones');
    }
}
