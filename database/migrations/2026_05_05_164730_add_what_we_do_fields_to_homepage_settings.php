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
        $table->string('what_we_do_title')->nullable();
        $table->text('what_we_do_description')->nullable();
        $table->json('what_we_do_cards')->nullable();
    });
}

public function down(): void
{
    Schema::table('homepage_settings', function (Blueprint $table) {
        $table->dropColumn(['what_we_do_title', 'what_we_do_description', 'what_we_do_cards']);
    });
}
};
