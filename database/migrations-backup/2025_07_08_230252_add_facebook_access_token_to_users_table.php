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
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('tiktok_follower_count');
            $table->dropColumn('tiktok_last_updated');
            // $table->string('facebook_access_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->integer('tiktok_follower_count')->nullable();
            $table->timestamp('tiktok_last_updated')->nullable();
            // $table->dropColumn('facebook_access_token');
        });
    }
};
