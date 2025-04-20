<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->foreignId('client_id')->constrained()->onDelete('cascade'); // Cliente que agenda la cita
            $table->foreignId('branch_id')->constrained()->onDelete('restrict'); // Sucursal donde se realizará la cita
            $table->foreignId('service_id')->constrained()->onDelete('restrict'); // Servicio agendado
            $table->timestamp('fecha_hora'); // Fecha y hora de la cita
            $table->string('estado')->default('pendiente'); // Estado de la cita (pendiente, confirmada, completada, cancelada, etc.)
            $table->text('notas')->nullable(); // Notas adicionales sobre la cita (opcional)
            $table->timestamps(); // Marcas de tiempo created_at y updated_at
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
