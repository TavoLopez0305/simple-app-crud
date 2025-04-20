<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->string('rol_name')->unique(); // Nombre del rol (administrador, editor, usuario), debe ser único
            $table->string('descripcion')->nullable(); // Descripción opcional del rol
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
        Schema::dropIfExists('roles');
    }
}
