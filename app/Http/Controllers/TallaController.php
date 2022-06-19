<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talla;

class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tallas = Talla::all();
        return view('talla.index')->with('tallas',$tallas);
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
        $talla = new Talla(); 
        $talla->nombre = $request->get('nombre');
        $talla->descripcion = $request->get('descripcion');
        $talla->save();
        return redirect('/tallas');
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
    public function edit($id_talla)
    {
        $talla = Talla::find($id_talla);
        $tallas = Talla::all();
        return view('talla.edit',compact('talla','tallas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_talla)
    {
        $talla =  Talla::find($id_talla); 
        $talla->nombre = $request->get('nombre');
        $talla->descripcion = $request->get('descripcion');
        $talla->save();
        return redirect('/tallas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_talla)
    {
        $talla = Talla::find($id_talla);
        $talla->delete();
        return redirect('/tallas');
    }
}
