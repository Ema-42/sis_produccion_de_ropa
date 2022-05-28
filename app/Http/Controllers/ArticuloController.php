<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos',$articulos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new Articulo();
        
        $articulos->id_categoria_articulo= $request->get('categoria');
        $articulos->nombre= $request->get('nombre');
        $articulos->descripcion= $request->get('descripcion');
        $articulos->imagen= $request->get('imagen');
        
        $articulos->save();
        //redireccionar luego de crear
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_articulo)
    {
        
        $articulo = Articulo::find($id_articulo);

        return view('articulo.edit')->with('articulo',$articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_articulo)
    {
        $articulo = Articulo::find($id_articulo);
        
        $articulo->id_categoria_articulo= $request->get('categoria');
        $articulo->nombre= $request->get('nombre');
        $articulo->descripcion= $request->get('descripcion');
        $articulo->imagen= $request->get('imagen');
        
        $articulo->save();
        //redireccionar luego de crear
        return redirect('/articulos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_articulo)
    {
        $articulo = Articulo::find($id_articulo);
        $articulo->delete();
        return redirect('/articulos');
    }
}
