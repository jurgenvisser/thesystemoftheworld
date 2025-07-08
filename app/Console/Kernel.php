<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * Voeg hier je eigen commands toe, bijvoorbeeld:
     * protected $commands = [
     *     \App\Console\Commands\UpdateTikTokFollowers::class,
     * ];
     *
     * @var array<int, class-string>
     */
    protected $commands = [
        // Register je artisan commands hier
        \App\Console\Commands\UpdateTikTokFollowers::class,
        \App\Console\Commands\UpdateDiscordStats::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tiktok:update-followers')->everyMinute();
        $schedule->command('discord:update-stats')->everyMinute();
        $schedule->command('tiktok:refresh-token')->everyTwoHours();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}