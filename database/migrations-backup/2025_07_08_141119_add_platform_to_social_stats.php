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
        Schema::table('social_stats', function (Blueprint $table) {
            $table->string('platform')->after('id')->default('tiktok');
        });
    }

    public function down(): void
    {
        Schema::table('social_stats', function (Blueprint $table) {
            $table->dropColumn('platform');
        });
    }
};
