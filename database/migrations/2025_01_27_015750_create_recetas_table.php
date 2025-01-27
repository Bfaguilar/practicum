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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade'); // Relación con Paciente
            $table->foreignId('doctor_id')->constrained('doctores')->onDelete('cascade');   // Relación con Doctor
            $table->foreignId('medicina_id')->constrained('medicinas')->onDelete('cascade'); // Relación con Medicina
            $table->string('dosis'); // Información sobre la dosis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
