<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\SocialStat;

class GenerateDiscordInvite extends Command
{
    protected $signature = 'discord:generate-invite';
    protected $description = 'Genereert een nieuwe Discord invite link en slaat deze op in de database.';

    public function handle()
    {
        try {
            $guildId = config('services.discord.guild_id');
            $token = config('services.discord.bot_token');
            $channelId = config('services.discord.invite_channel_id'); // maak dit aan in je config/services.php

            if (!$channelId) {
                $this->error('❌ Geen channel ID gevonden in config (services.discord.invite_channel_id).');
                return 1;
            }

            $inviteResponse = Http::withHeaders([
                'Authorization' => "Bot {$token}",
                'Content-Type' => 'application/json',
            ])->post("https://discord.com/api/v10/channels/{$channelId}/invites", [
                'max_age' => 0,      // nooit verlopen
                'max_uses' => 0,     // onbeperkt gebruik
                'temporary' => false,
                'unique' => true,    // altijd een nieuwe link
            ]);

            if ($inviteResponse->failed()) {
                $this->error('❌ Fout bij aanmaken van Discord invite: ' . $inviteResponse->body());
                return 1;
            }

            $inviteData = $inviteResponse->json();
            $inviteLink = "https://discord.gg/" . $inviteData['code'];

            // Sla op in je database (SocialStat tabel)
            $socialStat = SocialStat::firstOrNew(['platform' => 'discord']);
            $socialStat->invite_link = $inviteLink;
            $socialStat->save();

            $this->info("✅ Nieuwe Discord invite aangemaakt en opgeslagen: {$inviteLink}");
            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Onverwachte fout: ' . $e->getMessage());
            return 1;
        }
    }
}