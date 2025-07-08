<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\User;

class RefreshTikTokToken extends Command
{
    protected $signature = 'tiktok:refresh-token';

    protected $description = 'Ververs automatisch de TikTok access_token op basis van de refresh_token';

    public function handle(): void
    {
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->tiktok_refresh_token) {
            $this->error('Geen gebruiker of refresh token gevonden.');
            return;
        }

        $response = Http::asForm()->post('https://open.tiktokapis.com/v2/oauth/token/', [
            'client_key' => config('services.tiktok.client_key'),
            'client_secret' => config('services.tiktok.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $user->tiktok_refresh_token,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $user->tiktok_access_token = $data['access_token'];
            $user->tiktok_token_expires_at = Carbon::now()->addSeconds($data['expires_in']);
            $user->tiktok_refresh_token = $data['refresh_token'] ?? $user->tiktok_refresh_token;
            $user->tiktok_refresh_token_expires_at = isset($data['refresh_expires_in'])
                ? Carbon::now()->addSeconds($data['refresh_expires_in'])
                : $user->tiktok_refresh_token_expires_at;
            $user->save();

            $this->info('✅ TikTok access_token succesvol vernieuwd! Nieuwe code is: ' . $data['access_token']);
        } else {
            $this->error('❌ Mislukt: ' . $response->body());
        }
    }
}