<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::get('/producto', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index')->middleware('auth');
Route::get('/producto/filtrar',[App\Http\Controllers\ProductoController::class, 'filtrar'])->name('producto.filtro')->middleware('auth');
Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create')->middleware('auth');
Route::post('/producto/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store')->middleware('auth');
Route::get('/producto/edit/{id}', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit')->middleware('auth');
Route::post('/producto/update/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update')->middleware('auth');
Route::get('/producto/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('producto.show')->middleware('auth');
Route::get('/producto/destroy/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy')->middleware('auth');
Route::get('/perfil/show', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show')->middleware('auth');
Route::get('/perfil/edit/{id}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit')->middleware('auth');
Route::post('/perfil/update/{id}', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update')->middleware('auth');

Route::post('/img/store', [App\Http\Controllers\StorageController::class, 'store'])->name('imagenes.store')->middleware('auth');
Route::get('/img/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/imagenes/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists('/imagenes/'.$archivo))
    {
      return response()->download($url);
    }else{
        //si no se encuentra lanzamos un error 404.
        abort(404);
    }
})->middleware('auth');