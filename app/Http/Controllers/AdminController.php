<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin-dashboard');
    }

    public function refreshTikTokToken(): RedirectResponse
    {
        Artisan::call('tiktok:refresh-token');
        $output = Artisan::output();

        // Token ophalen uit output (indien beschikbaar in het outputformaat)
        preg_match('/Nieuwe code is: (.+)/', $output, $matches);
        $newToken = $matches[1] ?? null;

        return back()->with('status', 'TikTok access token handmatig vernieuwd.')
                     ->with('access_token', $newToken);
    }

    public function updateTikTokFollowers(): RedirectResponse
    {
        Artisan::call('tiktok:update-followers');
        $output = Artisan::output();

        // Follower count ophalen uit output (indien beschikbaar in het outputformaat)
        preg_match('/TikTok volgers geüpdatet: (\d+)/', $output, $matches);
        $followerCount = $matches[1] ?? null;

        return back()->with('status', 'Follower count handmatig opgehaald.')
                     ->with('follower_count', $followerCount);
    }
}