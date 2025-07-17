<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')
            ->scopes(['pages_show_list', 'instagram_basic', 'instagram_manage_insights'])
            ->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        $code = $request->query('code');
        
        if (!$code) {
            return redirect('/')->with('error', 'Geen code ontvangen van Facebook.');
        }
        // dd('start handleFacebookCallback')

        try {
            $response = Http::asForm()->post('https://graph.facebook.com/v19.0/oauth/access_token', [
                'client_id' => config('services.facebook.client_id'),
                'redirect_uri' => config('services.facebook.redirect'),
                'client_secret' => config('services.facebook.client_secret'),
                'code' => $code,
            ]);

            $data = $response->json();

            if (!isset($data['access_token'])) {
                return redirect('/')->with('error', 'Kon access token niet ophalen: ' . json_encode($data));
            }

            $accessToken = $data['access_token'];
            $expiresIn = $data['expires_in'] ?? null;

            // Vind vaste gebruiker
            $user = \App\Models\User::where('email', 'jurgenbv@gmail.com')->first();

            if ($user) {
                $user->facebook_access_token = $accessToken;

                if ($expiresIn) {
                    $user->facebook_token_expires_at = Carbon::now()->addSeconds($expiresIn);
                }

                $user->save();
            } else {
                Log::error('Facebook token: gebruiker met email jurgenbv@gmail.com niet gevonden.');
                dd('Facebook token: gebruiker met email jurgenbv@gmail.com niet gevonden.');
            }

            Log::info('Facebook access token opgeslagen voor gebruiker: ' . ($user ? $user->email : 'onbekend'));
            Log::info('Facebook access token response', $data);
            return redirect()->route('facebook.token.show')->with('token', $accessToken);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Log::error('Facebook token ophalen mislukt: ' . $e->getMessage());
            return redirect('/')->with('error', 'Fout bij ophalen Facebook token.');
        }
    }
}