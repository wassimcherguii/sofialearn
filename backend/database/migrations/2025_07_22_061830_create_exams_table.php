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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            
            // French columns (main language)
            $table->string('title_fr');
            $table->text('description_fr')->nullable();
            $table->text('instructions_fr')->nullable();
            
            // English columns
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('instructions_en')->nullable();
            
            // Arabic columns
            $table->string('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('instructions_ar')->nullable();
            
            // Non-translatable fields
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('duration')->nullable(); // in minutes
            $table->integer('max_points')->default(100);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index(['course_id']);
            $table->index(['date']);
            $table->index(['is_published']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
