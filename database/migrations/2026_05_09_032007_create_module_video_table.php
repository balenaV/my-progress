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
        Schema::create('module_video', function (Blueprint $table) {
            $table->id();

            $table->foreignId('module_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('video_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->unique(['module_id', 'video_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_video');
    }
};
