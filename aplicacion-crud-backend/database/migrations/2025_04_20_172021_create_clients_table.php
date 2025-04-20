<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->string('nombre'); // Nombre del cliente
            $table->string('apellidos'); // Apellidos del cliente
            $table->string('telefono'); // Número de teléfono del cliente
            $table->string('correo')->nullable(); // Correo electrónico del cliente (opcional)
            $table->string('direccion')->nullable(); // Dirección del cliente (opcional)
            $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento del cliente (opcional)
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
        Schema::dropIfExists('clients');
    }
}
