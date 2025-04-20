<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->string('nombre'); // Nombre del servicio
            $table->text('descripcion')->nullable(); // Descripción detallada del servicio (opcional)
            $table->decimal('precio', 8, 2); // Precio del servicio (8 dígitos en total, 2 decimales)
            $table->integer('duracion'); // Duración estimada del servicio en minutos
            $table->string('clave')->nullable(); // Clave o código único para el servicio (opcional)
            $table->boolean('requiere_sala')->default(false); // Indica si el servicio requiere una sala (por defecto no)
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
        Schema::dropIfExists('services');
    }
}
