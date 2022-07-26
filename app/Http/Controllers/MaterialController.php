<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::all();
        return view('material.index')->with('materiales',$materiales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Material(); 
        $material->nombre = $request->get('nombre');
        $material->descripcion = $request->get('descripcion');
        $material->save();
        return redirect('/materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_material)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_material)
    {
        $material = Material::find($id_material);
        $materiales = Material::all();
        return view('material.edit',compact('material','materiales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_material)
    {
        $material =  Material::find($id_material); 
        $material->nombre = $request->get('nombre');
        $material->descripcion = $request->get('descripcion');
        $material->save();
        return redirect('/materiales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_material)
    {
        $material = Material::find($id_material);
        if ($material->estado=='vigente') {
            $material->estado='eliminado';
            $material->save();
        } else {
            $material->estado='vigente';
            $material->save();
        }
        return redirect('/materiales');
    }
}
