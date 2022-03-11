<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function show(Request $request){
        $usuario = User::where('id',Auth::user()->id)->first();

        $pedidos = DB::table('pedidos')->where('user_id',Auth::user()->id)
                    ->whereIn('estado', function($query){
                        $query->select('estado')
                        ->from(with(new Pedido)->getTable())
                        ->where('estado', 'Preparado')
                        ->orWhere('estado', 'En proceso');
                    })
                    ->get();
        $ultimosPedidos = Pedido::latest()->take(2)
                    ->where('user_id', Auth::user()->id)
                    ->Where('estado', 'Recibido')
                    ->get();

        $usuarios = User::where('id','!=',Auth::user()->id)->orWhereNull('id')->get();
        /*$usuarios = User::select('name','email','telefono')->whereNotIn('id',$usuario)->get();*/
        return view('perfil.show',['usuario' => $usuario, 'pedidos'=> $pedidos, 'ultimospedidos' => $ultimosPedidos, 'usuarios' => $usuarios]);
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

    public function destroy(User $user, $id)
    {
        $users=User::find($id);
        $users->delete();

        return redirect()->route('perfil.show');
    }
}
