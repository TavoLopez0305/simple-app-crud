<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_services', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincrementable (BIGINT UNSIGNED)
            $table->foreignId('branch_id')->constrained()->onDelete('cascade'); // Clave foránea a la tabla 'branches'
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Clave foránea a la tabla 'services'
            $table->decimal('precio')->nullable(); // Precio específico del servicio en esta sucursal (si difiere del precio general)
            $table->integer('duracion')->nullable(); // Duración específica del servicio en esta sucursal (si difiere de la duración general)
            $table->boolean('disponible')->default(true); // Indica si el servicio está disponible en esta sucursal
            $table->timestamps(); // Marcas de tiempo created_at y updated_at
        
            // Definir claves únicas para evitar duplicados de la misma sucursal y servicio
            $table->unique(['branch_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_services');
    }
}
