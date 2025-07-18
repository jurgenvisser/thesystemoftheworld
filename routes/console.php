<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    file_put_contents(
        storage_path('logs/socials_update.log'),
        "\n\t" . now()->format('d-m-Y H:i:s') . "\n",
        FILE_APPEND
    );
})->everyFiveMinutes();

Schedule::command('discord:update-stats')
    ->everyFiveMinutes()
    ->appendOutputTo(storage_path('logs/socials_update.log'));

Schedule::command('tiktok:update-followers')
    ->everyFiveMinutes()
    ->appendOutputTo(storage_path('logs/socials_update.log'));

Schedule::command('meta:update-followers')
    ->everyFiveMinutes()
    ->appendOutputTo(storage_path('logs/socials_update.log'));


Schedule::call(function () {
    file_put_contents(
        storage_path('logs/refresh_token.log'),
        "\n\t" . now()->format('d-m-Y H:i:s') . "\n",
        FILE_APPEND
    );
})->everyTwoHours();

Schedule::command('tiktok:refresh-token')
    ->everyTwoHours()
    ->appendOutputTo(storage_path('logs/refresh_token.log'));

Schedule::command('meta:refresh-token')
    ->everyTwoHours()
    ->appendOutputTo(storage_path('logs/refresh_token.log'));
