<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Discord\Provider as DiscordProvider;
use SocialiteProviders\TikTok\TikTokExtendSocialite;
use Illuminate\Support\Facades\Event;

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
        // Registreer Discord als custom driver
        Socialite::extend('discord', function ($app) {
            $config = $app['config']['services.discord'];
            return Socialite::buildProvider(DiscordProvider::class, $config);
        });

        Event::listen(
            SocialiteWasCalled::class,
            [TikTokExtendSocialite::class, 'handle']
        );

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

        $discordMembersCount = $discordGuild['approximate_member_count'] ?? 0;

        View::composer('*', function ($view) {
            $stat = \App\Models\TikTokStat::find(1);
            $followerCount = $stat ? $stat->follower_count : 0;

            $view->with('tiktokFollowerCount', $followerCount);
        });

        // Deel met alle views
        View::share([
            'discordWidget' => $discordWidget,
            'discordLink' => $discordWidget['instant_invite'] ?? 'https://discord.gg/vmyW5gYQgA',
            'discordGuild' => $discordGuild,
            'discordMembersCount' => $discordMembersCount,
        ]);
    }
}