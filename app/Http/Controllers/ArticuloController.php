<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria_articulo;



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
        return view('articulo.index',compact('articulos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias =Categoria_articulo::all();
        return view('articulo.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*         $request->validate([
        'id_categoria_articulo' => 'required','nombre' => 'required','descripcion'=>'required','imagen'=>'required|image|mimes:png,jpg,jpeg|max:2048'
        ]); */
        $articulo = new Articulo();

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $path = 'img/';
            $filename = date('YmdHis').'_'.$file->getClientOriginalName();
            $uploadsiccess = $request->file('imagen')->move($path,$filename);
            $articulo->imagen= "$filename";
        } 
        $articulo->id_categoria_articulo= $request->get('id_categoria_articulo');
        $articulo->nombre= $request->get('nombre');
        $articulo->descripcion= $request->get('descripcion');
        
        $articulo->save();

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
        $categorias =Categoria_articulo::all();
        return view('articulo.edit',compact('articulo','categorias'));
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
        /* return($request->all()); */
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $path = 'img/';
            $filename = date('YmdHis').'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($path, $filename);
            $articulo->imagen= "$filename";
        }else{
            unset($articulo['imagen']);
        }
        $articulo->id_categoria_articulo= $request->get('id_categoria_articulo');
        $articulo->nombre= $request->get('nombre');
        $articulo->descripcion= $request->get('descripcion');
        
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
        if ($articulo->estado=='vigente') {
            $articulo->estado = 'eliminado';
            $articulo->save();
        } else {
            $articulo->estado = 'vigente';
            $articulo->save();
        }
        
        return redirect('/articulos');
    }
}
