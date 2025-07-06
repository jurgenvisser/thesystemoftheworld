<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Haal discord widget op, cache 15 min
        $discordWidget = Cache::remember('discord_widget_data', 900, function () {
            $response = Http::get('https://discord.com/api/guilds/1377620696334602262/widget.json');
            return $response->successful() ? $response->json() : null;
        });

        // Haal guild info op met ledenaantal
        $guildId = config('services.discord.guild_id');
        $token = config('services.discord.bot_token');

        $discordGuild = Cache::remember('discord_guild_data', 300, function () use ($token, $guildId) {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->get("https://discord.com/api/v10/guilds/{$guildId}", [
                'with_counts' => 'true',
            ]);
            return $response->successful() ? $response->json() : null;
        });

        $tiktokFollowers = 10;
        $totalCommunitySize = $discordGuild['approximate_member_count'] + $tiktokFollowers;
        View::share('totalCommunitySize', $totalCommunitySize);

        // Deel met alle views
        View::share([
            'discordWidget' => $discordWidget,
            'discordLink' => $discordWidget['instant_invite'] ?? 'https://discord.gg/vmyW5gYQgA',
            'discordGuild' => $discordGuild,
            'totalCommunitySize' => $totalCommunitySize,
        ]);
    }
}
