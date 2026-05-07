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
            // Check if column exists before adding it to prevent duplicate errors!
            if (!Schema::hasColumn('homepage_settings', 'hero_badge')) {
                $table->string('hero_badge')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'hero_title')) {
                $table->string('hero_title')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'hero_description')) {
                $table->text('hero_description')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'services_title')) {
                $table->string('services_title')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'services_description')) {
                $table->text('services_description')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'why_us_title')) {
                $table->string('why_us_title')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'why_us_description')) {
                $table->text('why_us_description')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'cta_title')) {
                $table->string('cta_title')->nullable();
            }
            if (!Schema::hasColumn('homepage_settings', 'cta_description')) {
                $table->text('cta_description')->nullable();
            }
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
