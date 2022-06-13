<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\InsumoController;
use App\Http\Livewire\CategoriaArticulos;
use App\Http\Controllers\CategoriaArticuloController;
use App\Http\Controllers\CategoriaInsumoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('auth.login');
});
//busca por defecto el metodo index del controlador

Route::resource('articulos', ArticuloController::class)->middleware('auth');
Route::resource('insumos', InsumoController::class)->middleware('auth');
Route::get('categoria_articulos', [CategoriaArticuloController::class,'index'])->middleware('auth');
Route::get('categoria_insumos', [CategoriaInsumoController::class,'index'])->middleware('auth');
/* Route::get('categoria_articulos',CategoriaArticulos::class); */

/* Route::get('articulos', function(){
    return view('articulo.index');
}); */

/* Route::get('categoria_articulos', function(){
    return view('categoria_articulos.index');
});

Route::get('categoria_insumos', function(){
    return view('categoria_insumos.index');
}); */
/* Route::get('insumos', function(){
    return view('insumo.index');
}); */

//Route::view('categoria_articulos','livewire.cat-articulos.categoria-articulos');
//Route::get('categoria_articulos',[CategoriaArticulos::class,'livewire.cat-articulos.categoria-articulos']);

//para la autenticacion con jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
