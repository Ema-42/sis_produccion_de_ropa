<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaArticuloController extends Controller
{
    public function index()
    {
        return view('categoria_articulos.index');
    }
}
