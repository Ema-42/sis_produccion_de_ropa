<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Cliente;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* dd(auth()->user()->id); */
        $usuarios =Usuario::all();
        $users =User::all();
        $empresas =Empresa::all();
        $clientes =Cliente::all();
        return view('pedido.create',compact('usuarios','empresas','clientes','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $nit = Empresa::find($request->id_empresa);
        
        
        $pedido = new Pedido();
        $pedido->id_empresa= $request->get('id_empresa');
        $pedido->id_cliente= $request->get('id_cliente');
        $pedido->fecha_entrega= $request->get('fecha_entrega');
        $pedido->descuento= $request->get('descuento');
        $pedido->comentarios= $request->get('comentarios');
        $pedido->direccion_entrega= $request->get('direccion_entrega');
        $pedido->total = $request->get('total');

        $pedido->estado=('espera');
        /* $pedido->id_usuario=(1); */
        $pedido->id_usuario=(1);
        $pedido->id_user=(auth()->user()->id);
        $pedido->nit = $nit->nit;
        $pedido->save();
        //redireccionar luego de listado
        return redirect('/pedidos');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
