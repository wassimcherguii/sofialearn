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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            
            // French columns (main language)
            $table->string('name_fr');
            $table->text('description_fr')->nullable();
            $table->string('slug_fr')->nullable();
            $table->text('meta_description_fr')->nullable();
            
            // English columns
            $table->string('name_en')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug_en')->nullable();
            $table->text('meta_description_en')->nullable();
            
            // Arabic columns
            $table->string('name_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('slug_ar')->nullable();
            $table->text('meta_description_ar')->nullable();
            
            // Non-translatable fields
            $table->string('language', 5)->default('fr');
            $table->foreignId('teacher_id')->constrained('users');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index(['teacher_id']);
            $table->index(['language']);
            $table->index(['is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
