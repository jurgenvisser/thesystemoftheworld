<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Register je artisan commands hier
        \App\Console\Commands\UpdateTikTokFollowers::class,
        \App\Console\Commands\UpdateDiscordStats::class,
        \App\Console\Commands\UpdateMetaFollowers::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // Schedule your commands here.
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}