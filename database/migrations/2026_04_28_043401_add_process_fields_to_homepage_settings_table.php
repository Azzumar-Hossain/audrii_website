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
            // Main Section Header
            if (!Schema::hasColumn('homepage_settings', 'process_title')) {
                $table->string('process_title')->nullable();
                $table->text('process_description')->nullable();
                
                // Step 1
                $table->string('process_1_title')->nullable();
                $table->string('process_1_icon')->nullable();
                $table->text('process_1_description')->nullable();
                
                // Step 2
                $table->string('process_2_title')->nullable();
                $table->string('process_2_icon')->nullable();
                $table->text('process_2_description')->nullable();
                
                // Step 3
                $table->string('process_3_title')->nullable();
                $table->string('process_3_icon')->nullable();
                $table->text('process_3_description')->nullable();
                
                // Step 4
                $table->string('process_4_title')->nullable();
                $table->string('process_4_icon')->nullable();
                $table->text('process_4_description')->nullable();
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
