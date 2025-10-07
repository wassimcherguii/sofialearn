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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();

            // French (primary)
            $table->string('name_fr');
            $table->text('description_fr')->nullable();
            $table->string('slug_fr')->nullable();

            // English
            $table->string('name_en')->nullable();
            $table->text('description_en')->nullable();
            $table->string('slug_en')->nullable();

            // Arabic
            $table->string('name_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('slug_ar')->nullable();

            // Other
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();

            // Indexes
            $table->index(['is_active']);
            $table->index(['display_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};



