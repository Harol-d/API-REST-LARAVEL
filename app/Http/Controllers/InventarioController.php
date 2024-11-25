<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * peticion Get
     */
    public function index()
    {
        $inventarios = inventario::all();
        $data = [
            'inventarios' => $inventarios,
            'status' => 200
        ];
        return response()->json($data,200);
    }
    public function view()
    {
        //el metodo all() obtiene todos los registros de la tabla, en este caso inventario y esto se almecena en la variable inventarios
        $inventarios = Inventario::all(); 
        //el metodo compact es el responsable de pasar los datos $inventarios a la vista y al mismo tiempo retornarla 
        return view('ejemplo', compact('inventarios'));
    }
    
}