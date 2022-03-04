<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Producto;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    static public function store(Request $request)
    {
        if (Auth::check()) {
            $userId=Auth::user()->id;
        }
        
        
        
        $productoId=request('id');
        $producto=Producto::find($productoId);
        
        //$cantidad=request('cantidad');
        //precio=request('precio');
        

        Cart::add($producto->id, $producto->nombre, 1, $producto->precio);
        if (Auth::check()) {
            Cart::store($userId);
        }
        else{
            Cart::store();
        }
        $itemsCesta = Cart::content()->toArray();
        foreach ($itemsCesta as $clave => $valor){
            $itemsCesta[$clave]['imagen']=Producto::find($valor['id'])->imagen;
        }
        return $itemsCesta;


    }

    static public function restore()
    {
        
        if (Auth::check()) {
            $userId=Auth::user()->id;
        }
        if (Auth::check()) {
            Cart::restore($userId);
        }
        else{
            Cart::restore();
        }
        $itemsCesta = Cart::content()->toArray();
        foreach ($itemsCesta as $clave => $valor){
            $itemsCesta[$clave]['imagen']=Producto::find($valor['id'])->imagen;
        }
        return $itemsCesta;
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
