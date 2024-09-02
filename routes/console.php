<?php

use App\Console\Commands\expiration;
use App\Console\Commands\Notify;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Schedule::command(expiration::class)->everyFifteenSeconds();
Schedule::command(Notify::class)->everyMinute();
