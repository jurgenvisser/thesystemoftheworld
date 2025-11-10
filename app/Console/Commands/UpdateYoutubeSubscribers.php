<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class UpdateYoutubeSubscribers extends Command
{
    protected $signature = 'youtube:update-subscribers';
    protected $description = 'Update het aantal YouTube subscribers in de database';

    public function handle()
    {
        $apiKey = env('YOUTUBE_API_KEY');
        $channelId = env('YOUTUBE_CHANNEL_ID');

        if (!$apiKey || !$channelId) {
            $this->error('❌ YOUTUBE_API_KEY of YOUTUBE_CHANNEL_ID ontbreekt in .env');
            Log::error('YouTube update failed: API key of Channel ID ontbreekt.');
            return;
        }

        try {
            $response = Http::timeout(30)->get('https://www.googleapis.com/youtube/v3/channels', [
                'part' => 'statistics',
                'id' => $channelId,
                'key' => $apiKey,
            ]);

            if (!$response->successful()) {
                $this->error('❌ YouTube API response was not successful: ' . $response->body());
                Log::error('YouTube API error: ' . $response->body());
                return;
            }

            $data = $response->json();

            if (empty($data['items'][0]['statistics']['subscriberCount'])) {
                $this->error('❌ Geen subscriber count gevonden in API response.');
                Log::error('YouTube API returned no subscriber count: ' . json_encode($data));
                return;
            }

            $subscriberCount = (int) $data['items'][0]['statistics']['subscriberCount'];

            $socialStat = DB::table('social_stats')->where('platform', 'youtube')->first();
            if (!$socialStat) {
                DB::table('social_stats')->insert([
                    'platform' => 'youtube',
                    'follower_count' => $subscriberCount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $this->info("✅ YouTube subscribers bijgewerkt: {$subscriberCount}");
                Log::info("YouTube subscribers updated successfully: {$subscriberCount}");
            } else {
                if ($socialStat->follower_count !== $subscriberCount) {
                    DB::table('social_stats')
                        ->where('platform', 'youtube')
                        ->update([
                            'follower_count' => $subscriberCount,
                            'updated_at' => Carbon::now(),
                        ]);
                    $this->info("✅ YouTube subscribers bijgewerkt: {$subscriberCount}");
                    Log::info("YouTube subscribers updated successfully: {$subscriberCount}");
                } else {
                    if (config('services.socials_log_all')) {
                        $this->info("ℹ️ YouTube subscribers zijn niet veranderd.");
                        Log::info("YouTube subscribers unchanged: {$subscriberCount}");
                    }
                }
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $this->error('❌ Verbindingsfout met YouTube API: ' . $e->getMessage());
            Log::error('YouTube ConnectionException: ' . $e->getMessage());
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $this->error('❌ YouTube API request exception: ' . $e->getMessage());
            Log::error('YouTube RequestException: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->error('❌ Onverwachte fout: ' . $e->getMessage());
            Log::error('YouTube unexpected exception: ' . $e->getMessage());
        }
    }
}