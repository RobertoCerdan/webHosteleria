<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', ['productos' => $productos]);
    }

    public function login()
    {
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
