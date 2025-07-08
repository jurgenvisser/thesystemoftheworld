<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Discord\Provider as DiscordProvider;
use SocialiteProviders\TikTok\TikTokExtendSocialite;
use Illuminate\Support\Facades\Event;
use App\Models\SocialStat;

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

        $tiktokFollowerCount = SocialStat::where('platform', 'tiktok')->value('follower_count');
        $discordMemberCount = SocialStat::where('platform', 'discord')->value('follower_count');
        $discordInviteLink = SocialStat::where('platform', 'discord')->value('invite_link');

        // Deel met alle views
        View::share([
            'tiktokFollowerCount' => $tiktokFollowerCount,
            'discordFollowerCount' => $discordMemberCount,
            'discordInviteLink' => $discordInviteLink ?? env('DISCORD_FALLBACK_INVITE', 'https://discord.gg/vmyW5gYQgA'),
            'appVersion' => config('app.version'),
        ]);
    }
}