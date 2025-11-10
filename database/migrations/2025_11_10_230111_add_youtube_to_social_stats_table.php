<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Voeg een nieuwe rij toe voor YouTube
        DB::table('social_stats')->insert([
            'platform' => 'youtube',
            'follower_count' => 0,
            'invite_link' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Verwijder de YouTube rij bij rollback
        DB::table('social_stats')->where('platform', 'youtube')->delete();
    }
};