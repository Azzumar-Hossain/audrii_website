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
            // Stat 1
            if (!Schema::hasColumn('homepage_settings', 'stat_1_number')) {
                $table->string('stat_1_number')->nullable();
                $table->string('stat_1_suffix')->nullable();
                $table->string('stat_1_label')->nullable();
            }
            // Stat 2
            if (!Schema::hasColumn('homepage_settings', 'stat_2_number')) {
                $table->string('stat_2_number')->nullable();
                $table->string('stat_2_suffix')->nullable();
                $table->string('stat_2_label')->nullable();
            }
            // Stat 3
            if (!Schema::hasColumn('homepage_settings', 'stat_3_number')) {
                $table->string('stat_3_number')->nullable();
                $table->string('stat_3_suffix')->nullable();
                $table->string('stat_3_label')->nullable();
            }
            // Stat 4
            if (!Schema::hasColumn('homepage_settings', 'stat_4_number')) {
                $table->string('stat_4_number')->nullable();
                $table->string('stat_4_suffix')->nullable();
                $table->string('stat_4_label')->nullable();
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
