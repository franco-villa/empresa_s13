<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('nPerCodigo'); // Clave primaria
            $table->char('cPerApellido', 50);
            $table->char('cPerNombre', 50);
            $table->string('cPerDireccion', 100);
            $table->date('dPerFecNac');
            $table->integer('nPerEdad')->length(11);
            $table->decimal('nPerSueldo', 6, 2);
            $table->string('cPerRnd', 50);
            $table->char('nPerEstado', 1)->default('1');
            $table->timestamps(); 
            $table->rememberToken(); 

            // Definir índices
            $table->index('cPerApellido', 'persona_cperapellido_index');
            $table->index('cPerNombre', 'persona_cpernombre_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
