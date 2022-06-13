<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaInsumoController extends Controller
{
    public function index()
    {
        return view('categoria_insumos.index');

    }
}
