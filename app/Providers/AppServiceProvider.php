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

        // Probeer de social stats uit de database te halen, fallback op 0
        try {
            $tiktokFollowerCount = SocialStat::where('platform', 'tiktok')->value('follower_count') ?? 0;
            $youtubeSubscriberCount = SocialStat::where('platform', 'youtube')->value('follower_count') ?? 0;
            $facebookFollowerCount = SocialStat::where('platform', 'facebook')->value('follower_count') ?? 0;
            $instagramFollowerCount = SocialStat::where('platform', 'instagram')->value('follower_count') ?? 0;
            $discordMemberCount = ($rawDiscordCount = SocialStat::where('platform', 'discord')->value('follower_count')) !== null ? $rawDiscordCount - 4 : 0;
            $discordInviteLink = SocialStat::where('platform', 'discord')->value('invite_link') ?? env('DISCORD_FALLBACK_INVITE', 'https://discord.gg/vmyW5gYQgA');
            $brevoFormLink = env('BREVO_FORM_LINK', 'https://d35b361a.sibforms.com/serve/MUIFAA__MFnpfklaLsq-h1R9a5jCNMMem44cDfmGZBa0L82F93fvN9Vf7X00OcGsdqAi90hU4m5paj5WGfUbZpDfEcTW7phvv-jEFl4N5CfblPctMHuoLaJyKZLH0WbvfrkhR0IKtPadYLIwDFx3EoyVTn_4NdolKQrOCnhR9DGOOV1mnsvICYcECLN7JuwWaCdVl2Tqvz384R40');
        } catch (\Exception $e) {
            $tiktokFollowerCount = 0;
            $youtubeSubscriberCount = 0;
            $facebookFollowerCount = 0;
            $instagramFollowerCount = 0;
            $discordMemberCount = 0;
            $discordInviteLink = env('DISCORD_FALLBACK_INVITE', 'https://discord.gg/vmyW5gYQgA');
            $brevoFormLink = env('BREVO_FORM_LINK', 'https://d35b361a.sibforms.com/serve/MUIFAA__MFnpfklaLsq-h1R9a5jCNMMem44cDfmGZBa0L82F93fvN9Vf7X00OcGsdqAi90hU4m5paj5WGfUbZpDfEcTW7phvv-jEFl4N5CfblPctMHuoLaJyKZLH0WbvfrkhR0IKtPadYLIwDFx3EoyVTn_4NdolKQrOCnhR9DGOOV1mnsvICYcECLN7JuwWaCdVl2Tqvz384R40');
        }

        // Deel met alle views
        View::share([
            'tiktokFollowerCount' => $tiktokFollowerCount,
            'youtubeSubscriberCount' => $youtubeSubscriberCount,
            'facebookFollowerCount' => $facebookFollowerCount,
            'instagramFollowerCount' => $instagramFollowerCount,
            'discordMemberCount' => $discordMemberCount,
            'totalFollowerCount' => $tiktokFollowerCount + $facebookFollowerCount + $instagramFollowerCount + $discordMemberCount,
            'discordInviteLink' => $discordInviteLink,
            'brevoFormLink' => $brevoFormLink,
        ]);
    }
}