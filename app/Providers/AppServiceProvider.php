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
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

        $tiktokFollowerCount = SocialStat::where('platform', 'tiktok')->value('follower_count') ?? 0;
        $facebookFollowerCount = SocialStat::where('platform', 'facebook')->value('follower_count') ?? 0;
        $instagramFollowerCount = SocialStat::where('platform', 'instagram')->value('follower_count') ?? 0;
        $discordMemberCount = ($rawDiscordCount = SocialStat::where('platform', 'discord')->value('follower_count')) !== null ? $rawDiscordCount - 4 : 0; // -4 om de bots en interne accounts uit te sluiten
        
        $discordInviteLink = SocialStat::where('platform', 'discord')->value('invite_link') ?? env('DISCORD_FALLBACK_INVITE', 'https://discord.gg/vmyW5gYQgA');

        // Deel met alle views
        View::share([
            'tiktokFollowerCount' => $tiktokFollowerCount,
            'facebookFollowerCount' => $facebookFollowerCount,
            'instagramFollowerCount' => $instagramFollowerCount,
            'discordMemberCount' => $discordMemberCount,
            'totalFollowerCount' => $tiktokFollowerCount + $facebookFollowerCount + $instagramFollowerCount + $discordMemberCount,
            'discordInviteLink' => $discordInviteLink,
            // 'appVersion' => config('app.version'),
        ]);
    }
}