<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Productos = Producto::all();
        $data = [
            'Productos' => $Productos,
            'status' => 200
        ];
        return response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required'
        ]);
        if($validator->fails()){
            $data = [
            'message' => 'error en la validacion de los datos',
            'errors' => $validator->errors(),
            'status' => 400
            ];
            return response()->json($data,400);
        }
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);
        if(!$producto){
            $data = [
                'message' => 'error no se ha podido crear el producto',
                'status' => 500
            ];
            return response()->json($data,500);
        }
        if($producto){
            $data = [
                'message' => 'Se ha creado el Producto',
                'status' => 201
            ];
            return response()->json($data,201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $id)
{
    // No es necesario hacer `Producto::find` porque Laravel ya encontró el producto
    if(!$id){
        $data = [
            'message' => 'No se ha encontrado el Producto',
            'status' => 500
        ];
        return response()->json($data, 500);
    }

    $data = [
        'producto' => $id,
        'status' => 200
    ];
    return response()->json($data, 200);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $id)
    {
        if(!$id){
            $data = [
                'message' => 'No se ha encontrado el Producto',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $id->delete();

        if($id){
            $data = [
                'message' => 'Se elimino el Producto',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
    }
}
