<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inventario', [InventarioController::class,'view']);
