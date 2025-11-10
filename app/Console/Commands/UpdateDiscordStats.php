<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\SocialStat;
use Carbon\Carbon;

class UpdateDiscordStats extends Command
{
    protected $signature = 'discord:update-stats';
    protected $description = 'Update Discord member count and invite link, save to database';

    public function handle()
    {
        try {
            $guildId = config('services.discord.guild_id');
            $token = config('services.discord.bot_token');

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
                    $msg = '❌ Geen member_count gevonden in API response.';
                    $this->error($msg);
                    $this->info($msg);
                    return 1;
                }

                $socialStat = SocialStat::firstOrNew(['platform' => 'discord']);

                $logMessages = [];
                $hasChanges = false;

                if ($socialStat->follower_count !== $memberCount) {
                    $socialStat->follower_count = $memberCount;
                    $logMessages[] = "✅ Discord member count geüpdatet naar: {$memberCount}";
                    $hasChanges = true;
                }

                if ($socialStat->invite_link !== $inviteLink) {
                    $socialStat->invite_link = $inviteLink;
                    $logMessages[] = "✅ Discord invite link geüpdatet naar: " . ($inviteLink ?? 'niet gevonden');
                    $hasChanges = true;
                }

                if ($hasChanges) {
                    $socialStat->updated_at = Carbon::now();
                    $socialStat->save();
                    foreach ($logMessages as $msg) {
                        $this->info($msg);
                    }
                } elseif (config('services.socials_log_all')) {
                    $msg = "ℹ️ Discord member count en invite link zijn niet veranderd.";
                    $this->info($msg);
                }

                return 0;
            } else {
                $msg = '❌ Fout bij ophalen Discord data.';
                $this->error($msg);
                $this->info($msg);
                if (!$guildResponse->successful()) {
                    $msg = '❌ Guild API response: ' . $guildResponse->body();
                    $this->error($msg);
                    $this->info($msg);
                }
                if (!$widgetResponse->successful()) {
                    $msg = '❌ Widget API response: ' . $widgetResponse->body();
                    $this->error($msg);
                    $this->info($msg);
                }

                return 1;
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $msg = '❌ Verbindingsfout met Discord API: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $msg = '❌ Discord API request exception: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        } catch (\Exception $e) {
            $msg = '❌ Onverwachte fout: ' . $e->getMessage();
            $this->error($msg);
            $this->info($msg);
        }

        return 1;
    }
}