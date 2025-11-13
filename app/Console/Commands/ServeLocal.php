<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeLocal extends Command
{
    protected $signature = 'serve:local';
    protected $description = 'Serve the application on 0.0.0.0:8000';

    public function handle()
    {
        $this->info('Starting Laravel server on 0.0.0.0:8000...');
        passthru('php artisan serve --host=0.0.0.0 --port=8000');
    }
}