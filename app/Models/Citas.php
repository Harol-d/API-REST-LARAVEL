<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    
    public $table = 'citas';

    public $fillable = [
        'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
        'tipo_servicio',
        'fecha',
        'hora'
    ];
}