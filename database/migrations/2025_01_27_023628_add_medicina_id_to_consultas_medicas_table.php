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
            if (!Schema::hasColumn('consultas_medicas', 'medicina_id')) {
                $table->foreignId('medicina_id')->after('cita_medica_id')->constrained('medicinas')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas_medicas', function (Blueprint $table) {
            if (Schema::hasColumn('consultas_medicas', 'medicina_id')) {
                $table->dropForeign(['medicina_id']);
                $table->dropColumn('medicina_id');
            }
        });
    }
};
