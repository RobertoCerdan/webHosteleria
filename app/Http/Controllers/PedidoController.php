<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('estado', 'En proceso')->get()->toArray();
        $pedidosConNombre=[];
        foreach($pedidos as $pedido){
            $pedido['user_name'] = User::find($pedido['user_id'])->name;
            array_push($pedidosConNombre, $pedido);
        }
        $pedidosTerminados = Pedido::where('estado', 'Preparado')->get();
        $pedidosTerminadosConNombre=[];
        foreach($pedidosTerminados as $pedido){
            $pedido['user_name'] = User::find($pedido['user_id'])->name;
            array_push($pedidosConNombre, $pedido);
        }
        return view('admin.index', [
            'pedidos' => $pedidosConNombre,
            'pedidosTerminados' => $pedidosTerminadosConNombre
        ]);
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
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->user_id=Auth::user()->id;
        $pedido->fechaReserva=date("Y-m-d H:i:s");
        //request('fecha-reserva');
        $pedido->estado="En proceso";
        $pedido->save();

        $itemsCesta = Cart::content()->toArray();
        foreach ($itemsCesta as $clave => $valor){
            DB::table('articulospedidos')->insert([
                'pedido_id' => $pedido->id,
                'producto_id'=> $itemsCesta[$clave]['id'],
            ]);
        }
        CarritoController::destroy();
        return view('carrito.confirmacion', [
            'productos' => CarritoController::getItems()
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $idPedido=request('id');
        $estado=request('estado');
        $pedido=Pedido::find($idPedido);
        $pedido->estado=$estado;
        $pedido->save();

        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, $id)
    {
        $pedidos=Pedido::find($id);
        $pedidos->delete();

        return redirect()->route('perfil.show');
    }
}
