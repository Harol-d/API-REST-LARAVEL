<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\citasController;

Route::get('/cita', [citasController::class, 'index']);
Route::get('/cita/{id}', [citasController::class, 'index']);
Route::post('/cita', [citasController::class, 'store']);
// Route::patch()
Route::put('/cita/{id}', [citasController::class, 'update']);
Route::delete('/cita/{id}', [citasController::class, 'destroy']);

/*
Route::get('/cliente', function () {
    return'cliente lista';
});

Route::get('/cliente/{id}', function () {
    return 'un cliente   ';
});

Route::post('/cliente', function () {
    return 'creando uncliente';
});

Route::put('/cliente/{id}', function () {
    return 'actualizando uncliente ';
});
 
Route::delete('/cliente/{id}', function () {
    return 'eliminando cliente ';
});
*/	