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
        Schema::table('citas_medicas', function (Blueprint $table) {
            $table->time('hora')->change(); // Cambia el tipo a TIME
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas_medicas', function (Blueprint $table) {
            $table->date('hora')->change(); // Revertir el cambio si es necesario
        });
    }
};
