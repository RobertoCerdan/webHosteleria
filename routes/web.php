<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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



Route::get('/home', [App\Http\Controllers\ProductoController::class, 'filtrar'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Auth::routes();


//----Carrito------
Route::get('/carrito/store/{id}', [App\Http\Controllers\CarritoController::class, 'store'])->name('carrito.store');
Route::get('/carrito/update/{id}', [App\Http\Controllers\CarritoController::class, 'update'])->name('carrito.update');
Route::get('/carrito/destroy', [App\Http\Controllers\CarritoController::class, 'destroy'])->name('carrito.destroy');
Route::get('/carrito/removeAll/{id}', [App\Http\Controllers\CarritoController::class, 'removeAll'])->name('carrito.removeAll');
Route::get('/carrito/restore', [App\Http\Controllers\CarritoController::class, 'restore'])->name('carrito.restore');
Route::get('/carrito/show', [App\Http\Controllers\CarritoController::class, 'show'])->name('carrito.show');
Route::get('/carrito/clear', [App\Http\Controllers\CarritoController::class, 'clear'])->name('carrito.clear');

//----Producto------
Route::get('/producto', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update');
Route::get('/producto/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('producto.show');
Route::get('/producto/destroy/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy');
Route::get('/producto/filtrar', [App\Http\Controllers\ProductoController::class, 'filtrar'])->name('producto.filtro');


//-----Pedidos------
Route::get('/pedido/store', [App\Http\Controllers\PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/update/{id}', [App\Http\Controllers\PedidoController::class, 'update'])->name('pedido.update');
Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/destroy/{id}', [App\Http\Controllers\PedidoController::class, 'destroy'])->name('pedido.destroy');


//--------Prueba
Route::get('/prueba/{archivo}', function ($archivo) {
    StorageController::destroy($archivo);
});


//Almacenar las fotos
Route::post('/img/store', [App\Http\Controllers\StorageController::class, 'store'])->name('imagenes.store');


//------Perfiles Usu
Route::get('/perfil/show', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show')->middleware('auth');
Route::get('/perfil/edit/{id}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit')->middleware('auth');
Route::post('/perfil/update/{id}', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update')->middleware('auth');
Route::get('/perfil/destroy/{id}', [App\Http\Controllers\PerfilController::class, 'destroy'])->name('perfil.destroy')->middleware('auth');


