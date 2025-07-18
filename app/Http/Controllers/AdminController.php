<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function refreshTikTokToken(): RedirectResponse
    {
        Artisan::call('tiktok:refresh-token');
        $output = Artisan::output();

        // Token ophalen uit output (indien beschikbaar in het outputformaat)
        preg_match('/Nieuwe code is: (.+)/', $output, $matches);
        $newToken = $matches[1] ?? null;

        return back()->with('status', 'TikTok access token handmatig vernieuwd.')
                     ->with('tiktok_access_token', $newToken);
    }

    public function refreshMetaToken(): RedirectResponse
    {
        Artisan::call('meta:refresh-token');
        $output = Artisan::output();

        // Token ophalen uit output (indien beschikbaar in het outputformaat)
        preg_match('/Nieuwe code is: (.+)/', $output, $matches);
        $newToken = $matches[1] ?? null;

        return back()->with('status', 'Meta access token handmatig vernieuwd.')
                     ->with('meta_access_token', $newToken);
    }

    public function updateTikTokFollowers(): RedirectResponse
    {
        Artisan::call('tiktok:update-followers');
        $output = Artisan::output();

        if ($output === '') {
            $output = 'ℹ️ TikTok volgers zijn niet veranderd.';
        }

        return back()->with('tiktok_status', '✅ Succes')
                     ->with('tiktok_output', $output);
    }

    public function updateMetaFollowers(): RedirectResponse
    {
        Artisan::call('meta:update-followers');
        $output = Artisan::output();

        if ($output === '') {
            $output = 'ℹ️ Meta volgers zijn niet veranderd.';
        }

        return back()->with('meta_status', '✅ Succes')
                     ->with('meta_output', $output);
    }

    public function updateDiscordFollowers(): RedirectResponse
    {
        Artisan::call('discord:update-stats');
        $output = Artisan::output();

        if ($output === '') {
            $output = 'ℹ️ Discord member count en invite link zijn niet veranderd.';
        }

        return back()->with('discord_status', '✅ Succes')
                     ->with('discord_output', $output);
    }
}