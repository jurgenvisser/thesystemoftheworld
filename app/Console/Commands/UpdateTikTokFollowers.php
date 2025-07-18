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

    public function handle()
    {
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->tiktok_access_token || !$user->tiktok_open_id) {
            $this->error('❌ Geen toegang tot TikTok tokens.');
            return;
        }

        if (!$user->tiktok_token_expires_at || Carbon::parse($user->tiktok_token_expires_at)->isPast()) {
            $this->error('❌ Access token is verlopen.');
            return;
        }

        try {
            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . $user->tiktok_access_token,
            ])->get('https://open.tiktokapis.com/v2/user/info/', [
                'open_id' => $user->tiktok_open_id,
                'fields' => 'follower_count',
            ]);

            if ($response->successful()) {
                $followers = $response->json()['data']['user']['follower_count'] ?? null;
                if ($followers !== null) {
                    // Haal oude follower count uit DB
                    $socialStat = SocialStat::firstOrNew(['platform' => 'tiktok']);

                    if ($socialStat->follower_count !== $followers) {
                        $socialStat->follower_count = $followers;
                        $socialStat->updated_at = Carbon::now();
                        $socialStat->save();

                        $this->info("✅ TikTok volgers geüpdatet naar: {$followers}");
                        return 0;
                    } else {
                        if (config('services.socials_log_all')) {
                            $this->info("ℹ️ TikTok volgers zijn niet veranderd.");
                            return 1;
                        }
                    }
                } else {
                    $this->error('❌ Follower count ontbreekt in API response.');
                    $this->info('❌ API response: ' . json_encode($response->json()));
                }
            } else {
                $this->error('❌ TikTok API response was not successful: ' . $response->body());
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $this->error('❌ Verbindingsfout met TikTok API: ' . $e->getMessage());
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $this->error('❌ TikTok API request exception: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->error('❌ Onverwachte fout: ' . $e->getMessage());
        }
    }
}