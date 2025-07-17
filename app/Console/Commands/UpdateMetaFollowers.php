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
        $pageId = config('services.facebook.page_id'); // of haal uit database

        $fbResponse = Http::get("https://graph.facebook.com/{$pageId}?fields=followers_count&access_token={$accessToken}");

        if ($fbResponse->successful()) {
            $fbData = $fbResponse->json();
            $fbFollowers = $fbData['followers_count'] ?? null;

            if ($fbFollowers !== null) {
                $socialStat = SocialStat::firstOrNew(['platform' => 'facebook']);

                if ($socialStat->follower_count !== $fbFollowers) {
                    $socialStat->follower_count = $fbFollowers;
                    $socialStat->updated_at = Carbon::now();
                    $socialStat->save();

                    $this->info("✅ Facebook volgers geüpdatet naar: {$fbFollowers}");
                } else {
                    if (config('services.socials_log_all')) {
                        $this->info("ℹ️ Facebook volgers zijn niet veranderd.");
                    }
                }
            } else {
                $this->error('❌ Facebook followers_count niet gevonden in response.');
            }
        } else {
            $this->error('❌ Fout bij ophalen Facebook data: ' . $fbResponse->body());
        }

        // --- Instagram Followers ophalen ---
        $instaAccountId = config('services.instagram.page_id'); // vul dit in

        if (!$instaAccountId) {
            $this->error('❌ Geen Instagram Page ID ingesteld.');
            return;
        }

        $instaResponse = Http::get("https://graph.facebook.com/{$instaAccountId}?fields=followers_count&access_token={$accessToken}");

        if ($instaResponse->successful()) {
            $instaData = $instaResponse->json();
            $instaFollowers = $instaData['followers_count'] ?? null;

            if ($instaFollowers !== null) {
                $socialStat = SocialStat::firstOrNew(['platform' => 'instagram']);

                if ($socialStat->follower_count !== $instaFollowers) {
                    $socialStat->follower_count = $instaFollowers;
                    $socialStat->updated_at = Carbon::now();
                    $socialStat->save();

                    $this->info("✅ Instagram volgers geüpdatet naar: {$instaFollowers}");
                } else {
                    if (config('services.socials_log_all')) {
                        $this->info("ℹ️ Instagram volgers zijn niet veranderd.");
                    }
                }
            } else {
                $this->error('❌ Instagram followers_count niet gevonden in response.');
            }
        } else {
            $this->error('❌ Fout bij ophalen Instagram data: ' . $instaResponse->body());
        }
    }
}