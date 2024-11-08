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
}