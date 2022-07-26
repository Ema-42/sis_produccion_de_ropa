<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuarios = User::all();
        return view('usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuario.create',compact('roles'));
    }
    public function b_list()
    {
        $usuarios = User::all();
        return view('usuario.black_list',compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $usuario = new User();
        $usuario->name= $request->get('nombre');
        $usuario->nombres= $request->get('nombre');
        $usuario->apellidos= $request->get('apellido');
        $usuario->state= 'active';
        $usuario->ndip= $request->get('ndip');
        $usuario->direccion= $request->get('direccion');
        $usuario->celular= $request->get('celular');
        $usuario->email= $request->get('correo');
        $usuario->password= Hash::make($request->get('password'));
        if ($request->get('rol')==1) {
            $usuario->rol= 'Admin';
        }
        if ($request->get('rol')==2) {
            $usuario->rol= 'Empleado';
        }

        $usuario->save();

        $usuario = User::latest('id')->first();
        /* guardando el usuario y rol en la tabla model_has_roles */
        $usuario->roles()->sync($request->get('rol'));
       
        

        //redireccionar luego de crear
        return redirect('/usuarios')->with('info','Se registró el usuario correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Role::all();
        /* dd($usuario); */
        return view('usuario.edit',compact('usuario','roles'));
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
        $usuario = User::find($id);
        
        $usuario->name= $request->get('nombre');
        $usuario->apellidos= $request->get('apellido');
        
        $usuario->email= $request->get('correo');
        $usuario->ndip= $request->get('ndip');
        $usuario->direccion= $request->get('direccion');
        $usuario->celular= $request->get('celular');
        $usuario->password= Hash::make($request->get('password'));
        if ($request->get('rol')==1) {
            $usuario->rol= 'Admin';
            $usuario->state= 'active';
        }
        if ($request->get('rol')==2) {
            $usuario->rol= 'Empleado';
            $usuario->state= 'active';
        }
        if ($request->get('rol')==4) {
            $usuario->rol= 'Bloqueado';
            $usuario->state= 'blocked';
        }
        $usuario->roles()->sync($request->get('rol'));
        $usuario->save();

        return redirect('/usuarios')->with('info','Se editó el usuario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=  User::find($id);
        if ($user->state =='blocked') {
            $user->state = 'active';
            $user->roles()->sync(2);
            $user->rol= 'Empleado';
            $user->save();
            return redirect('/usuarios/b_list');
        } else {
            $user->state = 'blocked';
            $user->roles()->sync(4); /* id de rol blockeado */
            $user->rol= 'Bloqueado';
            $user->save();
            return redirect('/usuarios');
        }
    }
}
