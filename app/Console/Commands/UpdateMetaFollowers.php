<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\SocialStat;
use App\Models\User;
use Carbon\Carbon;

class UpdateMetaFollowers extends Command
{
    protected $signature = 'meta:update-followers';
    protected $description = 'Update Facebook and Instagram follower counts and save to social_stats table';

    public function handle()
    {
        // Pak gebruiker waar token in zit
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->facebook_access_token) {
            $this->error('Geen gebruiker met geldige Facebook access token gevonden.');
            return;
        }

        $accessToken = $user->facebook_access_token;

        // --- Facebook Followers ophalen ---

        // Facebook Graph API endpoint voor pagina statistieken
        // Je hebt de Page ID nodig, die kan je in config of database zetten
        $pageId = config('services.facebook.page_id'); // of haal uit database

        $fbResponse = Http::get("https://graph.facebook.com/{$pageId}?fields=followers_count&access_token={$accessToken}");

        if ($fbResponse->successful()) {
            $fbData = $fbResponse->json();
            $fbFollowers = $fbData['followers_count'] ?? null;

            if ($fbFollowers !== null) {
                SocialStat::updateOrCreate(
                    ['platform' => 'facebook'],
                    ['follower_count' => $fbFollowers, 'updated_at' => Carbon::now()]
                );

                $this->info("Facebook followers geüpdatet: {$fbFollowers}");
            } else {
                $this->error('Facebook followers_count niet gevonden in response.');
            }
        } else {
            $this->error('Fout bij ophalen Facebook data: ' . $fbResponse->body());
        }

        // --- Instagram Followers ophalen ---

        // Voor Instagram heb je de Instagram Business Account ID nodig, die je via de Facebook Graph API kunt ophalen
        // Hier een voorbeeld om het ID te krijgen, vaak moet je dat 1x opslaan in config of db

        $instaAccountId = config('services.instagram.page_id'); // vul dit in

        if (!$instaAccountId) {
            $this->error('Geen Instagram Page ID ingesteld.');
            return;
        }

        $instaResponse = Http::get("https://graph.facebook.com/{$instaAccountId}?fields=followers_count&access_token={$accessToken}");

        if ($instaResponse->successful()) {
            $instaData = $instaResponse->json();
            $instaFollowers = $instaData['followers_count'] ?? null;

            if ($instaFollowers !== null) {
                SocialStat::updateOrCreate(
                    ['platform' => 'instagram'],
                    ['follower_count' => $instaFollowers, 'updated_at' => Carbon::now()]
                );

                $this->info("Instagram followers geüpdatet: {$instaFollowers}");
            } else {
                $this->error('Instagram followers_count niet gevonden in response.');
            }
        } else {
            $this->error('Fout bij ophalen Instagram data: ' . $instaResponse->body());
        }
    }
}