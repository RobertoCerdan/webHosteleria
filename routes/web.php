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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//----Carrito
Route::post('/carrito/store/{id}', [App\Http\Controllers\CarritoController::class, 'store'])->name('carrito.store');
Route::get('/carrito/get', [App\Http\Controllers\CarritoController::class, 'get'])->name('carrito.get');


//----Producto
Route::get('/producto', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/producto/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update');
Route::get('/producto/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('producto.show');
Route::get('/producto/destroy/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy');


//--------Prueba
Route::get('/prueba/{archivo}', function ($archivo) {
    StorageController::destroy($archivo);
});


//Almacenar las fotos
Route::post('/img/store', [App\Http\Controllers\StorageController::class, 'store'])->name('imagenes.store');

