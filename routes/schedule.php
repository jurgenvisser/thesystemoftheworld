<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Schedule;

return function () {
    Schedule::command('tiktok:update-followers')->everyMinute();
    Schedule::command('discord:update-stats')->everyMinute();
    Schedule::command('tiktok:refresh-token')->everyTwoHours();
    Schedule::command('meta:update-followers')->everyMinute();
};