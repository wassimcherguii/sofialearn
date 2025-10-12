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
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('skill_id')->nullable()->after('chapter_id')->constrained('skills')->nullOnDelete();

            // Optional: index for queries by skill
            $table->index(['skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropIndex(['skill_id']);
            $table->dropConstrainedForeignId('skill_id');
        });
    }
};








