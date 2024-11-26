<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\citas;
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
            'Numero_documento' => 'required|integer|max:9',
            'tipo_servicio' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);


        if ($validator->fails()) {
                $data =[
                    'message' => 'Error en los datos',
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
                'Numero_documento' => $request->Numero_documento,
                'tipo_servicio' => $request->tipo_servicio,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
            ]);
            $data =[
                'message' => 'Cita creada correctamente',
                'status' => 201,
                'citas' => $citas
            ];
            return response()->json($data, 201);
        }

        

    }