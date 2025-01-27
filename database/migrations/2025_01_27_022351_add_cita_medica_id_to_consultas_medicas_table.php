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
        Schema::table('consultas_medicas', function (Blueprint $table) {
            $table->foreignId('cita_medica_id')->after('id')->constrained('citas_medicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas_medicas', function (Blueprint $table) {
            $table->dropForeign(['cita_medica_id']);
            $table->dropColumn('cita_medica_id');
        });
    }
};
