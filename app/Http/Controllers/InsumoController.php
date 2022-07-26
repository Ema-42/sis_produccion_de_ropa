<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;
use App\Models\Categoria_insumo;

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
        $categorias =Categoria_insumo::all();
        return view('insumo.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumo = new Insumo();

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $path = 'img/';
            $filename = date('YmdHis').'_'.$file->getClientOriginalName();
            $uploadsiccess = $request->file('imagen')->move($path,$filename);
            $insumo->imagen= "$filename";
        } 
        $insumo->id_categoria_insumo= $request->get('id_categoria_insumo');
        $insumo->nombre= $request->get('nombre');
        $insumo->descripcion= $request->get('descripcion');
        
        $insumo->save();
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
        $categorias =Categoria_insumo::all();
        return view('insumo.edit',compact('insumo','categorias'));
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
        /* return($request->all()); */
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $path = 'img/';
            $filename = date('YmdHis').'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($path, $filename);
            $insumo->imagen= "$filename";
        }else{
            unset($articulo['imagen']);
        }
        $insumo->id_categoria_insumo= $request->get('id_categoria_insumo');
        $insumo->nombre= $request->get('nombre');
        $insumo->descripcion= $request->get('descripcion');
        
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
        if ($insumo->estado=='vigente') {
            $insumo->estado = 'eliminado';
            $insumo->save();
        } else {
            $insumo->estado = 'vigente';
            $insumo->save();
        }
        return redirect('/insumos');
    }
}
