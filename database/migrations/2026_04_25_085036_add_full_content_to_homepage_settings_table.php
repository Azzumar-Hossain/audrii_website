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
        Schema::table('homepage_settings', function (Blueprint $table) {
            // Expertise Section
            $table->string('expertise_small_title')->nullable();
            $table->string('expertise_main_title')->nullable();
            $table->text('expertise_description')->nullable();

            // Portfolio Section
            $table->string('portfolio_small_title')->nullable();
            $table->string('portfolio_main_title')->nullable();

            // Offer Section
            $table->string('offer_small_title')->nullable();
            $table->string('offer_main_title')->nullable();
            $table->text('offer_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            //
        });
    }
};
