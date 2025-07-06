<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\User;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $tiktokData = null;

            // Pak vaste gebruiker met email jurgenbv@gmail.com
            $user = User::where('email', 'jurgenbv@gmail.com')->first();

            if ($user && $user->tiktok_access_token) {
                // Check of access token verlopen is
                if (!$user->tiktok_token_expires_at || Carbon::parse($user->tiktok_token_expires_at)->isPast()) {
                    $tiktokData = ['error' => 'TikTok access token is verlopen'];
                    // Je zou hier ook token refresh logica kunnen aanroepen als je wilt
                } else {
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $user->tiktok_access_token,
                    ])->get('https://open.tiktokapis.com/v2/user/info/', [
                        'open_id' => $user->tiktok_open_id,
                        'fields' => 'follower_count',
                    ]);

                    $tiktokData = $response->successful()
                        ? $response->json()['data'] ?? null
                        : ['error' => 'TikTok API fout', 'message' => $response->body()];
                }
            }

            $view->with('tiktokData', $tiktokData);
        });
    }
}