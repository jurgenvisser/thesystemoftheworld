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
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->facebook_access_token) {
            $msg = '❌ Geen gebruiker met geldige Facebook access token gevonden.';
            $this->error($msg);
            $this->info($msg);
            return;
        }

        $accessToken = $user->facebook_access_token;

        // --- Facebook Followers ophalen ---
        $pageId = config('services.facebook.page_id');

        try {
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

                        $msg = "✅ Facebook volgers geüpdatet naar: {$fbFollowers}";
                        $this->info($msg);
                    } else {
                        if (config('services.socials_log_all')) {
                            $msg = "ℹ️ Facebook volgers zijn niet veranderd.";
                            $this->info($msg);
                        }
                    }
                } else {
                    $msg = '❌ Facebook followers_count niet gevonden in response.';
                    $this->error($msg);
                    $this->info($msg);
                }
            } else {
                $msg = '❌ Fout bij ophalen Facebook data: ' . $fbResponse->body();
                $this->error($msg);
                $this->info($msg);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $msg = '❌ Verbindingsfout met Facebook API: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $msg = '❌ Facebook API request exception: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Exception $e) {
            $msg = '❌ Onverwachte fout bij ophalen Facebook data: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        }

        // --- Instagram Followers ophalen ---
        $instaAccountId = config('services.instagram.page_id');

        if (!$instaAccountId) {
            $msg = '❌ Geen Instagram Page ID ingesteld.';
            $this->error($msg);
            $this->info($msg);
            return;
        }

        try {
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

                        $msg = "✅ Instagram volgers geüpdatet naar: {$instaFollowers}";
                        $this->info($msg);
                    } else {
                        if (config('services.socials_log_all')) {
                            $msg = "ℹ️ Instagram volgers zijn niet veranderd.";
                            $this->info($msg);
                        }
                    }
                } else {
                    $msg = '❌ Instagram followers_count niet gevonden in response.';
                    $this->error($msg);
                    $this->info($msg);
                }
            } else {
                $msg = '❌ Fout bij ophalen Instagram data: ' . $instaResponse->body();
                $this->error($msg);
                $this->info($msg);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $msg = '❌ Verbindingsfout met Instagram API: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $msg = '❌ Instagram API request exception: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Exception $e) {
            $msg = '❌ Onverwachte fout bij ophalen Instagram data: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        }
    }
}