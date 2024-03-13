<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Ahorro;
use App\Models\Deuda;
use App\Models\Egreso;
use App\Models\Empresa;
use App\Models\Ingreso;

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
        
        $egreso = Egreso::where('borrado', 0)->count();
        $ingreso = Ingreso::where('borrado', 0)->count();
        $ahorro = Ahorro::where('borrado', 0)->count();
        $deuda = Deuda::where('borrado', 0)->count();
        $empresa = Empresa::where('borrado', 0)->count();

        return view('home', compact('egreso', 'empresa', 'deuda', 'ahorro', 'ingreso'));
    }
}
