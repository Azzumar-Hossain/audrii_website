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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // e.g., 'Web Development', 'Mobile App'
            $table->string('image')->nullable(); // For the project thumbnail
            $table->text('description');
            $table->string('client_name')->nullable();
            $table->string('project_link')->nullable(); // Optional link to the live project
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
