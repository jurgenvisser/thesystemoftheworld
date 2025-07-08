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
        Schema::rename('tiktok_stats', 'social_stats');
    }

    public function down(): void
    {
        Schema::rename('social_stats', 'tiktok_stats');
    }
};
