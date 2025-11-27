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
        $recensies = [
            ['naam' => 'Noémi', 'sterren' => 5, 'datum' => '2025-11-27 15:05:00', 'beschrijving' => 
                'Sinds ik bij The System zit, heb ik mijn kracht teruggevonden: durven door te gaan, hulp vragen wanneer nodig en steeds dichter bij mezelf komen. <br><br> The System heeft me geholpen door structuur, vertrouwen en een diepe verbinding met mezelf te geven, waardoor ik de tools heb gekregen om mijn leven bewust vorm te geven.'
            ],
            ['naam' => 'Feyona', 'sterren' => 5, 'datum' => '2025-11-27 15:09:00', 'beschrijving' => 
                'Door The System heb ik overwonnen dat ik over mijn angsten heen ben gekomen. <br><br> Deze mensen willen je helpen juist omdat je pijn hebt en het je niet alleen lukt.'
            ],
            ['naam' => 'Anoniem', 'sterren' => 5, 'datum' => '2025-11-27 15:10:00', 'beschrijving' => 
                'Dankzij The System, de community en de oprechte juiste aandacht en begeleiding heb ik overwonnen dat ik mezelf mag zijn, meer durf te spreken en herinner dat mijn emoties er gewoon mogen zijn.'
            ],
            ['naam' => 'Mark V.', 'sterren' => 5, 'datum' => '2025-11-27 20:56:00', 'beschrijving' => 
                'Toen ik bij the system kwam toen wist ik niet meer wie is nou echt was, maar nu that er in zit krijg ik weer steeds beter teweten wie ik nou echt ben. <br><br> The system is een community die kijkt naar jou persoonlijke groei, waar je niet aan een deadline zit en alles gaat om je eigen tempo.'
            ]
        ];

        usort($recensies, fn($a, $b) => strtotime($b['datum']) - strtotime($a['datum']));
        $average = round(array_sum(array_column($recensies, 'sterren')) / count($recensies), 1);
        $count = count($recensies);

        // Registreer Discord als custom driver
        Socialite::extend('discord', function ($app) {
            $config = $app['config']['services.discord'];
            return Socialite::buildProvider(DiscordProvider::class, $config);
        });

        Event::listen(
            SocialiteWasCalled::class,
            [TikTokExtendSocialite::class, 'handle']
        );

        // Probeer de social stats uit de database te halen, fallback op 0 of env variabelen indien niet beschikbaar
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

        // Data beschikbaar maken voor alle review Blades
        View::share([
            'tiktokFollowerCount' => $tiktokFollowerCount,
            'youtubeSubscriberCount' => $youtubeSubscriberCount,
            'facebookFollowerCount' => $facebookFollowerCount,
            'instagramFollowerCount' => $instagramFollowerCount,
            'discordMemberCount' => $discordMemberCount,
            'totalFollowerCount' => $tiktokFollowerCount + $facebookFollowerCount + $instagramFollowerCount + $discordMemberCount,
            'discordInviteLink' => $discordInviteLink,
            'brevoFormLink' => $brevoFormLink,
            'reviews' => $recensies,
            'reviewsAverage' => $average,
            'reviewsCount' => $count,
        ]);
    }
}