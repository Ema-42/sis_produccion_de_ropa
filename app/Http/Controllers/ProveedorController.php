<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor= new Proveedor();
        $proveedor->primer_nombre = $request->get('primer_nombre');
        $proveedor->segundo_nombre = $request->get('segundo_nombre');
        $proveedor->apellido_paterno = $request->get('apellido_paterno');
        $proveedor->apellido_materno = $request->get('apellido_materno');
        $proveedor->nombre_empresa = $request->get('nombre_empresa');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->celular = $request->get('celular');
        $proveedor->nro_dip = $request->get('nro_dip');
        $proveedor->nit = $request->get('nit');
        $proveedor->correo = $request->get('correo');
        $proveedor->direccion = $request->get('direccion');

        $proveedor->save();
        return redirect('/proveedores');
        
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
    public function edit($id_proveedor)
    {
        $proveedor = Proveedor::find($id_proveedor);
        return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proveedor)
    {
        $proveedor=  Proveedor::find($id_proveedor);
        $proveedor->primer_nombre = $request->get('primer_nombre');
        $proveedor->segundo_nombre = $request->get('segundo_nombre');
        $proveedor->apellido_paterno = $request->get('apellido_paterno');
        $proveedor->apellido_materno = $request->get('apellido_materno');
        $proveedor->nombre_empresa = $request->get('nombre_empresa');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->celular = $request->get('celular');
        $proveedor->nro_dip = $request->get('nro_dip');
        $proveedor->nit = $request->get('nit');
        $proveedor->correo = $request->get('correo');
        $proveedor->direccion = $request->get('direccion');

        $proveedor->save();
        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proveedor)
    {
        $proveedor = Proveedor::find($id_proveedor);
        if ($proveedor->estado=='vigente') {
            $proveedor->estado='eliminado';
            $proveedor->save();
        } else {
            $proveedor->estado='vigente';
            $proveedor->save();
        }
        return redirect('/proveedores');
    }
}
