<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request); */
        $cliente= new Cliente();
        $cliente->primer_nombre = $request->get('primer_nombre');
        $cliente->segundo_nombre = $request->get('segundo_nombre');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_materno = $request->get('apellido_materno');
        $cliente->fecha_nacimiento = $request->get('fecha_nacimiento');
        $cliente->sexo = $request->get('sexo');
        $cliente->telefono = $request->get('telefono');
        $cliente->celular = $request->get('celular');
        $cliente->nro_dip = $request->get('nro_dip');
        $cliente->correo = $request->get('correo');
        $cliente->direccion = $request->get('direccion');

        $cliente->save();
        return redirect('/clientes');
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
    public function edit($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        $cliente=  Cliente::find($id_cliente);
        $cliente->primer_nombre = $request->get('primer_nombre');
        $cliente->segundo_nombre = $request->get('segundo_nombre');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_materno = $request->get('apellido_materno');
        $cliente->fecha_nacimiento = $request->get('fecha_nacimiento');
        $cliente->sexo = $request->get('sexo');
        $cliente->telefono = $request->get('telefono');
        $cliente->celular = $request->get('celular');
        $cliente->nro_dip = $request->get('nro_dip');
        $cliente->correo = $request->get('correo');
        $cliente->direccion = $request->get('direccion');

        $cliente->save();
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        return redirect('/clientes');
    }
}
