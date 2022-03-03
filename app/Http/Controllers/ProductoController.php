<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\StorageController;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreProducto=request('nombre');
        $precio=request('precio');
        $descripcion=request('descripcion');
        $categoria=request('categoria');

        $archivo=$request->file('imagen');
        $nombreArchivo=$archivo->getClientOriginalName();

        StorageController::save($archivo, $nombreArchivo);

        $producto=new Producto();
        $producto->nombre=$nombreProducto;
        $producto->precio=$precio;
        $producto->descripcion=$descripcion;
        $producto->categoria=$categoria;
        $producto->imagen=$nombreArchivo;
        $producto->save();

        return redirect()->route('producto.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto, $id)
    {
        $producto=Producto::find($id);
        return view('producto.show', [
            'producto' => $producto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto, $id)
    {
        $producto=Producto::find($id);
        return view('producto.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto=Producto::find($id);

        $nombreProducto=request('nombre');
        $precio=request('precio');
        $descripcion=request('descripcion');
        $categoria=request('categoria');

        $archivo=$request->file('imagen');
        $nombreArchivo=$archivo->getClientOriginalName();
        if(request('imagen')!=null){
            StorageController::destroy($producto->imagen);
            StorageController::save($archivo, $nombreArchivo);
        }
        $producto->nombre=$nombreProducto;
        $producto->precio=$precio;
        $producto->descripcion=$descripcion;
        $producto->categoria=$categoria;
        $producto->imagen=$nombreArchivo;
        $producto->save();

        return redirect()->route('producto.edit', $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $idProducto=request('id');
        $producto=Producto::find($idProducto);

        //Esto no funciona...invertigar mas adelante
        StorageController::destroy($producto->imagen);

        $producto->delete();

        return redirect()->route('producto.index');

    }
}
