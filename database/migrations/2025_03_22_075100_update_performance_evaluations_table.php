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
        Schema::table('performance_evaluations', function (Blueprint $table) {
            // Remove score columns if they exist
            $table->dropColumn(['performance_score', 'behavioral_score', 'project_score', 'final_score']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('performance_evaluations', function (Blueprint $table) {
            $table->decimal('performance_score', 5, 2)->default(0);
            $table->decimal('behavioral_score', 5, 2)->default(0);
            $table->decimal('project_score', 5, 2)->default(0);
            $table->decimal('final_score', 5, 2)->default(0);
        });
    }
};
