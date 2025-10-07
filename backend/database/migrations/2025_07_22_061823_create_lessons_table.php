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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained('chapters')->onDelete('cascade');
            
            // French columns (main language)
            $table->string('name_fr');
            $table->text('description_fr')->nullable();
            $table->longText('content_fr')->nullable();
            $table->text('instructions_fr')->nullable();
            
            // English columns
            $table->string('name_en')->nullable();
            $table->text('description_en')->nullable();
            $table->longText('content_en')->nullable();
            $table->text('instructions_en')->nullable();
            
            // Arabic columns
            $table->string('name_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->longText('content_ar')->nullable();
            $table->text('instructions_ar')->nullable();
            
            // Non-translatable fields
            $table->unsignedInteger('order')->default(0);
            $table->enum('type', ['video', 'document', 'quiz', 'homework'])->default('video');
            $table->timestamps();
            
            // Indexes
            $table->index(['chapter_id']);
            $table->index(['order']);
            $table->index(['type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
