<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UpdateTikTokFollowers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-tik-tok-followers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->tiktok_access_token) {
            $this->error('Geen TikTok gebruiker of access token gevonden.');
            return;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $user->tiktok_access_token,
        ])->get('https://open.tiktokapis.com/v2/user/info/', [
            'open_id' => $user->tiktok_open_id,
            'fields' => 'follower_count',
        ]);

        if ($response->successful()) {
            $data = $response->json()['data'] ?? null;
            if ($data && isset($data['follower_count'])) {
                \App\Models\TikTokStat::updateOrCreate(
                    ['id' => 1],
                    ['follower_count' => $data['follower_count']]
                );

                $this->info('TikTok volgers geüpdatet: ' . $data['follower_count']);
            }
        } else {
            $this->error('Fout bij ophalen TikTok data: ' . $response->body());
        }
    }
}
