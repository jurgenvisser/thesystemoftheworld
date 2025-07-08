<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TikTokController extends Controller
{
    public function redirectToTikTok()
    {
        $verifier = bin2hex(random_bytes(64));
        $challenge = rtrim(strtr(base64_encode(hash('sha256', $verifier, true)), '+/', '-_'), '=');

        session(['tiktok_code_verifier' => $verifier]);

        $query = http_build_query([
            'client_key' => config('services.tiktok.client_key'),
            'response_type' => 'code',
            'scope' => 'user.info.basic,user.info.stats',
            'redirect_uri' => config('services.tiktok.redirect_uri'),
            'state' => uniqid(),
            'code_challenge' => $challenge,
            'code_challenge_method' => 'S256',
        ]);

        return redirect('https://www.tiktok.com/v2/auth/authorize?' . $query);
    }

    public function handleTikTokCallback(Request $request)
    {
        if ($request->has('error')) {
            return response()->json(['error' => $request->input('error')], 400);
        }

        $code = $request->input('code');
        $verifier = session('tiktok_code_verifier');

        $response = Http::asForm()->post('https://open.tiktokapis.com/v2/oauth/token/', [
            'client_key' => config('services.tiktok.client_key'),
            'client_secret' => config('services.tiktok.client_secret'),
            'code' => $code,
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('services.tiktok.redirect_uri'),
            'code_verifier' => $verifier,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Sla op in de database
            $user = Auth::user(); // Zorg dat je ingelogd bent
            $user->tiktok_open_id = $data['open_id'];
            $user->tiktok_access_token = $data['access_token'];
            $user->tiktok_refresh_token = $data['refresh_token'];
            $user->tiktok_token_expires_at = Carbon::now()->addSeconds($data['expires_in']);
            $user->tiktok_refresh_token_expires_at = Carbon::now()->addSeconds($data['refresh_expires_in'] ?? 0);
            $user->save();

            return response()->json([
                'message' => 'TikTok tokens opgeslagen',
                'data' => $data,
                'refresh_token_expires_at' => $user->tiktok_refresh_token_expires_at,
            ]);
        }

        return response()->json([
            'error' => 'TikTok token request failed',
            'message' => $response->body(),
        ], $response->status());
    }
}