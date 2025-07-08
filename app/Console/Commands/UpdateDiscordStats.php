<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\SocialStat;

class UpdateDiscordStats extends Command
{
    protected $signature = 'discord:update-stats';
    protected $description = 'Update Discord member count and invite link, save to database';

    public function handle()
    {
        $guildId = config('services.discord.guild_id');
        $token = config('services.discord.bot_token');

        // Haal guild info met member count en invite link (widget)
        $guildResponse = Http::withHeaders([
            'Authorization' => "Bot {$token}",
        ])->get("https://discord.com/api/v10/guilds/{$guildId}", [
            'with_counts' => 'true',
        ]);

        $widgetResponse = Http::get("https://discord.com/api/guilds/{$guildId}/widget.json");

        if ($guildResponse->successful() && $widgetResponse->successful()) {
            $guildData = $guildResponse->json();
            $widgetData = $widgetResponse->json();

            $memberCount = $guildData['approximate_member_count'] ?? null;
            $inviteLink = $widgetData['instant_invite'] ?? null;

            if ($memberCount === null) {
                $this->error('Geen member_count gevonden in API response.');
                return 1; // exit with error code
            }

            if ($inviteLink === null) {
                $this->error('Geen invite link gevonden in widget API response.');
                // Je kan hier kiezen om alsnog verder te gaan zonder invite link of juist stoppen:
                // return 1; // stoppen als invite link verplicht is
            }

            SocialStat::updateOrCreate(
                ['platform' => 'discord'],
                [
                    'follower_count' => $memberCount,
                    'invite_link' => $inviteLink,
                ]
            );

            $this->info("✅ Discord member count updated: {$memberCount}");
            $this->info("✅ Discord invite link updated: " . ($inviteLink ?? 'niet gevonden'));

            return 0; // success
        } else {
            $this->error('Fout bij ophalen Discord data.');

            if (!$guildResponse->successful()) {
                $this->error('Guild API response: ' . $guildResponse->body());
            }
            if (!$widgetResponse->successful()) {
                $this->error('Widget API response: ' . $widgetResponse->body());
            }

            return 1; // error
        }
    }
}