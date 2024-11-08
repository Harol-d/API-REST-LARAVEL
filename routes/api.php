<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
//Peticion Get
Route::get('/inventario', [InventarioController::class,'index']);
//peticion Get Productos 
Route::get('/producto', [ProductoController::class,'index']);
//peticion Post producto
Route::post('/producto', [ProductoController::class,'store']);
//peticion Get solo un producto 
Route::get('/producto/{id}', [ProductoController::class,'show']);
//perticion patch
Route::put('/producto/{id}', [ProductoController::class,'update']);
//peticion Delete
Route::delete('/producto/{id}', [ProductoController::class,'destroy']);