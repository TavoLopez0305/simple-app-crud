<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->string('nombre'); // Nombre de la sucursal
            $table->string('clave')->unique(); // Clave específica de la sucursal (debe ser única)
            $table->string('direccion'); // Dirección de la sucursal
            $table->string('telefono'); // Número de teléfono de la sucursal
            $table->string('horario_atencion'); // Horario de atención de la sucursal (ej: "L-V 9-18")
            $table->string('numero_trabajadores'); // Número de trabajadores en la sucursal
            $table->string('encargado'); // Nombre del encargado de la sucursal
            $table->timestamps(); // Marcas de tiempo created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
