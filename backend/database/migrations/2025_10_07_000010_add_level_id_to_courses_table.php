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
        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('level_id')->nullable()->after('teacher_id')->constrained('levels')->nullOnDelete();

            // Optional: index for querying by level
            $table->index(['level_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropIndex(['level_id']);
            $table->dropConstrainedForeignId('level_id');
        });
    }
};


