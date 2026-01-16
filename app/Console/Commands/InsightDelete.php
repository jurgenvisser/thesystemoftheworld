<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Insight;
use Illuminate\Support\Facades\DB;

class InsightDelete extends Command
{
    /**
     * MEMORY AID — INSIGHT DELETE
     *
     * Default behaviour:
     * - Deletes from the DEFAULT (dev/local) database connection
     *
     * Production safety:
     * - Use --from=production to target prod
     * - Requires DOUBLE confirmation unless --force is used
     *
     * Examples:
     *  php artisan insight:delete inzicht-2
     *  php artisan insight:delete inzicht-2 --from=production
     *  php artisan insight:delete inzicht-2 --from=production --force
     */
    protected $signature = 'insight:delete
        {slug : The insight slug}
        {--from= : Database connection (default = app default)}
        {--force : Skip all confirmations}';

    protected $description = 'Delete an insight from the database by slug (dev by default, prod only explicitly)';

    public function handle(): int
    {
        $slug = $this->argument('slug');
        $connection = $this->option('from') ?: config('database.default');

        $this->line("Target connection: <info>{$connection}</info>");

        $query = Insight::on($connection)->where('slug', $slug);
        $insight = $query->first();

        if (! $insight) {
            $this->error("Insight '{$slug}' not found on connection '{$connection}'.");
            return self::FAILURE;
        }

        // Extra paranoia for production
        if ($connection === 'production' && ! $this->option('force')) {
            $this->warn('⚠️  YOU ARE ABOUT TO DELETE FROM PRODUCTION');

            if (! $this->confirm("Type YES to continue deleting '{$slug}' from PRODUCTION", false, 'YES')) {
                $this->info('Aborted.');
                return self::SUCCESS;
            }

            if (! $this->confirm('This action is irreversible. Are you absolutely sure?')) {
                $this->info('Aborted.');
                return self::SUCCESS;
            }
        }

        // Normal confirmation for non-prod
        if ($connection !== 'production' && ! $this->option('force')) {
            if (! $this->confirm("Delete insight '{$slug}' from '{$connection}'?")) {
                $this->info('Aborted.');
                return self::SUCCESS;
            }
        }

        $insight->delete();

        $this->info("Insight '{$slug}' deleted from connection '{$connection}'.");

        return self::SUCCESS;
    }
}