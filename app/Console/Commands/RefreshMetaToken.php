<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\User;

class RefreshMetaToken extends Command
{
    protected $signature = 'meta:refresh-token';

    protected $description = 'Ververs automatisch de Meta access_token op basis van de refresh_token';

    public function handle(): void
    {
        // Pak de gebruiker met de token
        $user = User::where('email', 'jurgenbv@gmail.com')->first();

        if (!$user || !$user->facebook_access_token) {
            $this->error('Geen gebruiker of refresh token gevonden.');
            return;
        }

        // Maak de POST request naar de Meta API om nieuwe tokens te krijgen
        $response = Http::asForm()->post('https://graph.facebook.com/oauth/access_token', [
            'grant_type' => 'fb_exchange_token',
            'client_id' => config('services.facebook.client_id'),
            'client_secret' => config('services.facebook.client_secret'),
            'fb_exchange_token' => $user->facebook_access_token,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Sla de nieuwe token en expiry data op
            $user->facebook_access_token = $data['access_token'];
            if (isset($data['expires_in'])) {
                $user->facebook_token_expires_at = Carbon::now()->addSeconds($data['expires_in']);
            }
            // Facebook geeft geen aparte refresh_token, meestal wordt de access token verlengd
            $user->save();

            $this->info('✅ Meta access_token succesvol vernieuwd! Nieuwe code is: ' . $data['access_token']);
        } else {
            $this->error('❌ Mislukt: ' . $response->body());
        }
    }
}