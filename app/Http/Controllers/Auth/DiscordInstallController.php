<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscordInstallController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id'     => config('services.discord.client_id'),
            'redirect_uri'  => config('app.url') . '/discord/install/callback',
            'response_type' => 'code',
            'scope'         => 'bot applications.commands',
            'permissions'   => 8, // admin (pas aan indien nodig)
            'guild_select'  => true,
        ]);

        return redirect('https://discord.com/oauth2/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $code = $request->get('code');
        $installedGuildId = $request->get('guild_id');

        if (!$code || !$installedGuildId) {
            dd([
                'query' => $request->query(),
                'full_url' => $request->fullUrl(),
            ]);
        }

        // OPTIONAL maar sterk aanbevolen:
        // check of dit jouw server is
        $allowedGuilds = config('services.discord.allowed_guilds');
        if (!is_array($allowedGuilds)) {
            abort(500, 'Discord allowed guilds misconfigured');
        }

        if (!in_array($installedGuildId, $allowedGuilds, true)) {
            abort(403, 'Unauthorized guild');
        }

        // Token exchange
        $response = Http::asForm()->post('https://discord.com/api/oauth2/token', [
            'client_id'     => config('services.discord.client_id'),
            'client_secret' => config('services.discord.client_secret'),
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'redirect_uri'  => config('app.url') . '/discord/install/callback',
        ]);

        if (!$response->successful()) {
            abort(500, 'Discord token exchange failed: ' . $response->body());
        }

        $data = $response->json();

        // Hier is de OAuth-grant officieel afgerond
        // Je hoeft dit niet eens op te slaan als je wilt
        // Het feit dat dit gelukt is = integratie compleet
        // Tokens worden hier niet opgeslagen door ontwerp, omdat deze controller alleen de installatie afrondt

        return redirect('/dashboard')
            ->with('success', 'Discord bot succesvol geïnstalleerd');
    }
}