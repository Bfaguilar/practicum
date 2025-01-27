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
            if (!Schema::hasColumn('consultas_medicas', 'diagnostico')) {
                $table->text('diagnostico')->after('medicina_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas_medicas', function (Blueprint $table) {
            if (Schema::hasColumn('consultas_medicas', 'diagnostico')) {
                $table->dropColumn('diagnostico');
            }
        });
    }
};
