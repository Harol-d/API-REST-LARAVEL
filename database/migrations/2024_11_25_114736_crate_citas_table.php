<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('tipo_documento');
            $table->integer('numero_documento')->unique();
            $table->string('tipo_servicio');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
        });
    }
    
    public function store()
    {
        
    }
};