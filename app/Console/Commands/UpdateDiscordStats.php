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
                $this->error('❌ Geen member_count gevonden in API response.');
                return 1; // exit with error code
            }

            // Haal bestaand record op of maak nieuw aan
            $socialStat = SocialStat::firstOrNew(['platform' => 'discord']);

            $hasFollowerChange = $socialStat->follower_count !== $memberCount;
            $hasLinkChange = $socialStat->invite_link !== $inviteLink;
            $hasChanges = $hasFollowerChange || $hasLinkChange;

            if ($hasChanges) {
                if ($hasFollowerChange) {
                    $socialStat->follower_count = $memberCount;
                    $this->info("✅ Discord member count geüpdatet naar: {$memberCount}");
                }

                if ($hasLinkChange) {
                    $socialStat->invite_link = $inviteLink;
                    $this->info("✅ Discord invite link geüpdatet naar: " . ($inviteLink ?? 'niet gevonden'));
                }

                $socialStat->updated_at = now();
                $socialStat->save();
            } elseif (config('services.socials_log_all')) {
                $this->info("ℹ️ Discord member count en invite link zijn niet veranderd.");
            }


            return 0; // success
        } else {
            $this->error('❌ Fout bij ophalen Discord data.');

            if (!$guildResponse->successful()) {
                $this->error('❌ Guild API response: ' . $guildResponse->body());
            }
            if (!$widgetResponse->successful()) {
                $this->error('❌ Widget API response: ' . $widgetResponse->body());
            }

            return 1; // error
        }
    }
}