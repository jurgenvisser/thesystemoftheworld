<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Insight;

class DeleteInsight extends Command
{
    protected $signature = 'insight:delete {slug} {--force : Skip confirmation}';

    protected $description = 'Delete an insight from the database by slug';

    public function handle(): int
    {
        $slug = $this->argument('slug');

        $insight = Insight::where('slug', $slug)->first();

        if (! $insight) {
            $this->error("Insight '{$slug}' not found.");
            return self::FAILURE;
        }

        if (! $this->option('force')) {
            if (! $this->confirm("Are you sure you want to delete insight '{$slug}'? This cannot be undone.")) {
                $this->info('Aborted.');
                return self::SUCCESS;
            }
        }

        $insight->delete();

        $this->info("Insight '{$slug}' has been deleted from the database.");

        return self::SUCCESS;
    }
}