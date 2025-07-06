<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DiscordController extends Controller
{
    public function redirectToDiscord()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback()
    {
        try {
            $discordUser = Socialite::driver('discord')->user();

            // Zoek gebruiker op Discord ID in database
            $user = User::where('discord_id', $discordUser->id)->first();

            if (!$user) {
                // Maak nieuwe gebruiker aan
                $user = User::create([
                    'name' => $discordUser->username,
                    'email' => $discordUser->email,
                    'discord_id' => $discordUser->id,
                    'avatar' => $discordUser->avatar,
                    'password' => bcrypt(str()->random(16)), // random wachtwoord want login via Discord
                ]);
            }

            // Log gebruiker in
            Auth::login($user);

            return redirect('/dashboard'); // Of waar je ook heen wil
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Discord login mislukt: '.$e->getMessage()]);
        }
    }
}