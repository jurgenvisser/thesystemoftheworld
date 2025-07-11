<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\SocialStat;
use Carbon\Carbon;

class UpdateTikTokFollowers extends Command
{
    protected $signature = 'tiktok:update-followers';
    protected $description = 'Update TikTok follower count from the API and save to the database';

    public function handle(): void
    {
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->tiktok_access_token || !$user->tiktok_open_id) {
            $this->error('Geen toegang tot TikTok tokens.');
            return;
        }

        if (!$user->tiktok_token_expires_at || Carbon::parse($user->tiktok_token_expires_at)->isPast()) {
            $this->error('Access token is verlopen.');
            return;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $user->tiktok_access_token,
        ])->get('https://open.tiktokapis.com/v2/user/info/', [
            'open_id' => $user->tiktok_open_id,
            'fields' => 'follower_count',
        ]);

        if ($response->successful()) {
            // $this->info('API response: ' . json_encode($response->json()));

            $followers = $response->json()['data']['user']['follower_count'] ?? null;

            if ($followers !== null) {
                SocialStat::updateOrCreate(
                    ['platform' => 'tiktok'],
                    ['follower_count' => $followers]
                );
                $this->info("✅ TikTok follower count updated: {$followers}");
            } else {
                $this->error('Follower count ontbreekt in API response.');
                $this->info('API response: ' . json_encode($response->json()));
            }
        } else {
            $this->error('Fout bij ophalen TikTok data: ' . $response->body());
        }
    }
}