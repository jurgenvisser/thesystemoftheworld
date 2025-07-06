<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Discord
            if (!Schema::hasColumn('users', 'discord_id')) {
                $table->string('discord_id')->nullable()->unique()->after('email');
            }

            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('discord_id');
            }

            // TikTok
            if (!Schema::hasColumn('users', 'tiktok_open_id')) {
                $table->string('tiktok_open_id')->nullable()->unique();
            }

            if (!Schema::hasColumn('users', 'tiktok_access_token')) {
                $table->text('tiktok_access_token')->nullable();
            }

            if (!Schema::hasColumn('users', 'tiktok_refresh_token')) {
                $table->text('tiktok_refresh_token')->nullable();
            }

            if (!Schema::hasColumn('users', 'tiktok_token_expires_at')) {
                $table->timestamp('tiktok_token_expires_at')->nullable();
            }

            if (!Schema::hasColumn('users', 'tiktok_refresh_token_expires_at')) {
                $table->timestamp('tiktok_refresh_token_expires_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'discord_id',
                'avatar',
                'tiktok_open_id',
                'tiktok_access_token',
                'tiktok_refresh_token',
                'tiktok_token_expires_at',
                'tiktok_refresh_token_expires_at',
            ]);
        });
    }
};