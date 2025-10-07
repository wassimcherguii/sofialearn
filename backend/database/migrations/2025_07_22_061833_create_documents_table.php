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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');
            
            // French columns (main language)
            $table->string('title_fr');
            $table->text('description_fr')->nullable();
            
            // English columns
            $table->string('title_en')->nullable();
            $table->text('description_en')->nullable();
            
            // Arabic columns
            $table->string('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            
            // Non-translatable fields
            $table->string('file_path');
            $table->string('file_type');
            $table->string('file_size')->nullable();
            $table->string('mime_type')->nullable();
            $table->boolean('is_downloadable')->default(true);
            $table->timestamps();
            
            // Indexes
            $table->index(['lesson_id']);
            $table->index(['file_type']);
            $table->index(['is_downloadable']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
