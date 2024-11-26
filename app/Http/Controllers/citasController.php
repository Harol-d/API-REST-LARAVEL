<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class citasController extends Controller
{
    public function index()
    {
        $citas = citas::all();
        
        if ($citas->isEmpty()) {
            $data = [
                'message' => 'No hay citas disponibles',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Good',
            'status' => 200,
            'data' => $citas
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipo_documento' => 'required|string|max:255',
            'numero_documento' => 'required|integer',
            'tipo_servicio' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i'
        ]);


        if ($validator->fails()) {
                $data =[
                    'message' => 'Error en la validacion de los datos',
                    'status' => 400,
                    'errors' => $validator->errors()
                ];
                return response()->json($data, 400);
            }
            $citas = citas::create(
            [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'tipo_servicio' => $request->tipo_servicio,
                'fecha' => $request->fecha,
                'hora' => $request->hora
            ]);
            if($citas){
            $data =[
                'message' => 'Cita creada correctamente',
                'status' => 201,
                'citas' => $citas
            ];
            return response()->json($data, 201);
        }
        if(!$citas){
            $data = [
                'message' => 'error no se ha podido crear el producto',
                'status' => 500
            ];
            return response()->json($data,500);
        }
    }

        

    }