<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show(Request $request){
        $usuario = User::where('id',Auth::user()->id)->first();
        /*$pedidos = Pedido::where('user_id', Auth::user()->id)->first()
                    ->where('estado','preparado')
                    ->orWhere('estado','en proceso')
                    ->get();
        $ultimosPedidos = Pedido::latest()->take(2)
                    ->where('user_id', Auth::user()->id)->first()
                    ->where('estado', 'recibido')
                    ->get();*/
        return view('perfil.show',['usuario' => $usuario]);
    }

    public function edit(User $usuario, $id)
    {
        $usuario=User::find($id);
        return view('perfil.edit', [
            'usuario' => $usuario,
        ]);
    }
    public function update(Request $request, $id)
    {
        $usuario=User::find($id);

        $nombre=request('nombre');
        $telefono=request('telefono');

        $usuario->name=$nombre;
        $usuario->telefono=$telefono;
        $usuario->save();

        return redirect()->route('perfil.show', $usuario->id);
    }
}
