<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\InsumoController;
use App\Http\Livewire\CategoriaArticulos;
use App\Http\Controllers\CategoriaArticuloController;
use App\Http\Controllers\CategoriaInsumoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EncargadoProduccionController;
use App\Http\Controllers\PedidoProduccionController;
use App\Http\Controllers\ListaNegraController;




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
Route::get('usuarios/b_list',[UsuarioController::class,'b_list'])->middleware('auth');
/* Route::post('usuarios/block/{id}',[UsuarioController::class,'block'])->middleware('auth');*/
Route::get('produccion/{id_pedido}/asignar',[PedidoProduccionController::class,'asignar'])->middleware('auth')->name('produccion.asignar');
Route::get('produccion/{id_pedido}/ver_asignaciones',[PedidoProduccionController::class,'ver_asignaciones'])->middleware('auth')->name('produccion.ver_asignaciones');
Route::get('produccion/sin_asignar',[PedidoProduccionController::class,'sin_asignar'])->middleware('auth')->name('produccion.sin_asignar');
Route::get('produccion/produciendo',[PedidoProduccionController::class,'produciendo'])->middleware('auth')->name('produccion.produciendo');
Route::get('produccion/entregados',[PedidoProduccionController::class,'entregados'])->middleware('auth')->name('produccion.entregados');
Route::post('produccion/{id_pedido}/entregar',[PedidoProduccionController::class,'entregar'])->middleware('auth')->name('produccion.entregar');
Route::get('produccion/{id_pedido}/ver_detalles',[PedidoProduccionController::class,'ver_detalles'])->middleware('auth')->name('produccion.ver_detalles');

Route::get('produccion/{id_pedido}/detalleReporte',[PedidoProduccionController::class,'detalleReporte'])->middleware('auth')->name('produccion.detalleReporte');

Route::get('produccion/listaReporteEntregados',[PedidoProduccionController::class,'listaReporteEntregados'])->middleware('auth')->name('produccion.listaReporteEntregados');
Route::get('produccion/{id_pedido}/detalleReporteEntregados',[PedidoProduccionController::class,'detalleReporteEntregados'])->middleware('auth')->name('produccion.detalleReporteEntregados');



Route::get('pedidos/{id_pedido}/ver_detalles',[PedidoController::class,'ver_detalles'])->middleware('auth')->name('pedidos.ver_detalles');
Route::get('pedidos/{id_cotizacion}/iniciar_pedido',[PedidoController::class,'iniciarPedido'])->middleware('auth')->name('pedidos.iniciarPedido');
Route::post('pedidos/guardar_pedido',[PedidoController::class,'guardarPedido'])->middleware('auth')->name('pedidos.guardar');
Route::post('pedidos/editar_pedido',[PedidoController::class,'editarPedido'])->middleware('auth')->name('pedidos.editar');
Route::get('pedidos/{id_pedido}/detalleReporte',[PedidoController::class,'detalleReporte'])->middleware('auth')->name('pedidos.detalleReporte');
Route::get('pedidos/listaReporte',[PedidoController::class,'listaReporte'])->middleware('auth')->name('pedidos.listaReporte');

Route::get('cotizaciones/{id_cotizacion}/ver_detalles',[CotizacionController::class,'ver_detalles'])->middleware('auth')->name('cotizaciones.ver_detalles');
Route::get('cotizaciones/listaReporte',[CotizacionController::class,'listaReporte'])->middleware('auth')->name('cotizaciones.listaReporte');
Route::get('cotizaciones/{id_cotizacion}/detalleReporte',[CotizacionController::class,'detalleReporte'])->middleware('auth')->name('cotizaciones.detalleReporte');


Route::get('ingresos/{id_ingreso}/ver_detalles',[IngresoController::class,'ver_detalles'])->middleware('auth')->name('ingresos.ver_detalles');
Route::get('ingresos/{id_ingreso}/detalleReporte',[IngresoController::class,'detalleReporte'])->middleware('auth')->name('ingresos.detalleReporte');
Route::get('ingresos/listaReporte',[IngresoController::class,'listaReporte'])->middleware('auth')->name('ingresos.listaReporte');


Route::resource('produccion',PedidoProduccionController::class)->middleware('auth');
Route::resource('encargado_producciones',EncargadoProduccionController::class)->middleware('auth');
Route::resource('tallas', TallaController::class)->middleware('auth');
Route::resource('ingresos', IngresoController::class)->middleware('auth');
Route::resource('usuarios', UsuarioController::class)->middleware('auth');
Route::resource('proveedores', ProveedorController::class)->middleware('auth');
Route::resource('pedidos', PedidoController::class)->middleware('auth');

Route::resource('cotizaciones', CotizacionController::class)->middleware('auth');

Route::resource('materiales', MaterialController::class)->middleware('auth');
Route::resource('empresas', EmpresaController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('articulos', ArticuloController::class)->middleware('auth');
Route::resource('insumos', InsumoController::class)->middleware('auth');
Route::get('categoria_articulos', [CategoriaArticuloController::class,'index'])->middleware('auth');
Route::get('categoria_insumos', [CategoriaInsumoController::class,'index'])->middleware('auth');






/* Route::get('categoria_articulos',CategoriaArticulos::class); */

/* Route::get('lista_negra', function(){
    return view('lista_negra.index');
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
