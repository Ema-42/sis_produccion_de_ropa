<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::all();
        return view('insumo.index')->with('insumos',$insumos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumos = new Insumo();
        
        $insumos->id_categoria_insumo= $request->get('categoria');
        $insumos->nombre= $request->get('nombre');
        $insumos->descripcion= $request->get('descripcion');
        $insumos->imagen= $request->get('imagen');
        
        $insumos->save();
        //redireccionar luego de crear
        return redirect('/insumos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_insumo)
    {
        $insumo = Insumo::find($id_insumo);
        return view('insumo.edit')->with('insumo',$insumo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_insumo)
    {
        $insumo = Insumo::find($id_insumo);
        
        $insumo->id_categoria_insumo= $request->get('categoria');
        $insumo->nombre= $request->get('nombre');
        $insumo->descripcion= $request->get('descripcion');
        $insumo->imagen= $request->get('imagen');
        
        $insumo->save();
        //redireccionar luego de crear
        return redirect('/insumos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_insumo)
    {
        $insumo = Insumo::find($id_insumo);
        $insumo->delete();
        return redirect('/insumos');
    }
}
