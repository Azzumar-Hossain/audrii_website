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
        Schema::create('about_us_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_title')->nullable();
            $table->string('hero_image')->nullable();
            
            // Mission Section
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            
            // Vision Section
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            
            // Story / Main Content Section
            $table->string('story_title')->nullable();
            $table->text('story_content')->nullable();
            $table->string('story_image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_settings');
    }
};
