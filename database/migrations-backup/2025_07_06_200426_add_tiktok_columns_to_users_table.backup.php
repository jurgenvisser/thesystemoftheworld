<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tiktok_open_id')->nullable()->unique();
            $table->text('tiktok_access_token')->nullable();
            $table->text('tiktok_refresh_token')->nullable();
            $table->timestamp('tiktok_token_expires_at')->nullable();
            $table->timestamp('tiktok_refresh_token_expires_at')->nullable();  // <- deze toevoegen
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tiktok_open_id',
                'tiktok_access_token',
                'tiktok_refresh_token',
                'tiktok_token_expires_at',
                'tiktok_refresh_token_expires_at',
            ]);
        });
    }
};
