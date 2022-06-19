<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa(); 
        $empresa->nombre = $request->get('nombre');
        $empresa->nit = $request->get('nit');
        $empresa->telefono = $request->get('telefono');
        $empresa->celular = $request->get('celular');
        $empresa->direccion = $request->get('direccion');
        $empresa->correo = $request->get('correo');
        $empresa->save();
        return redirect('/empresas');
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
    public function edit($id_empresa)
    {
        $empresa = Empresa::find($id_empresa);
        $empresas = Empresa::all();
        return view('empresa.edit',compact('empresa','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_empresa)
    {
        $empresa =  Empresa::find($id_empresa); 
        $empresa->nombre = $request->get('nombre');
        $empresa->nit = $request->get('nit');
        $empresa->telefono = $request->get('telefono');
        $empresa->celular = $request->get('celular');
        $empresa->direccion = $request->get('direccion');
        $empresa->correo = $request->get('correo');
        $empresa->save();
        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empresa)
    {
        $empresa = Empresa::find($id_empresa);
        $empresa->delete();
        return redirect('/empresas');
    }
}
