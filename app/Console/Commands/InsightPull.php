<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// NOTE:
// This command replaces the old insight:export.
// Pull is now the single entry point for creating
// temporary insight work files from any database.

class InsightPull extends Command
{
    protected $signature = 'insight:pull {slug} {--from= : Database connection to pull from (defaults to dev/local)}';

    protected $description = 'Pull an insight from a database connection and export it as a temporary PHP work file';

    public function handle()
    {
        $slug = $this->argument('slug');
        $from = $this->option('from') ?? config('database.default');
        $this->line("Using database connection: {$from}");

        /**
         * SAFETY CHECK
         *
         * Pulling from production is allowed, but must always be explicit
         * and confirmed by the user to avoid accidental data confusion.
         */
        if ($from === 'production') {
            $this->warn('⚠️  You are pulling from the PRODUCTION database.');
            $this->warn('This will overwrite any existing local work file for this insight.');

            if (! $this->confirm('Are you absolutely sure you want to continue?')) {
                $this->info('Pull aborted.');
                return Command::SUCCESS;
            }
        }

        $this->info("Pulling insight [{$slug}] from connection [{$from}]...");

        // Fetch insight from the specified connection
        $insight = \App\Models\Insight::on($from)
            ->where('slug', $slug)
            ->first();

        if (! $insight) {
            $this->error("Insight with slug '{$slug}' not found on connection '{$from}'.");
            return Command::FAILURE;
        }

        // NOTE:
        // This structure must exactly match what InsightSync expects.
        // If you change this shape, update the sync command accordingly.
        $export = [
            'slug' => $insight->slug,
            'title' => $insight->title,
            'published' => (bool) $insight->published,
            'content' => $insight->content,
        ];

        $path = resource_path("insights/{$slug}.php");

        // Ensure directory exists
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        // Generate pretty PHP export (short array syntax)
        $php = <<<PHP
<?php

/**
 * TEMPORARY WORK FILE — INSIGHT WORKFLOW
 *
 * IMPORTANT:
 * This file is NOT the source of truth.
 * The DATABASE is the source of truth.
 *
 * This file exists only to make editing
 * and previewing insights comfortable.
 *
 * Recommended workflow:
 *
 * 1. Pull insight into a local work file:
 *    php artisan insight:pull {$slug}
 *
 * 2. Edit this file freely.
 *
 * 3. Preview in browser:
 *    /admin/inzichten/preview/{$slug}
 *
 * 4. Sync changes back to database:
 *    - Dev/local:
 *      php artisan insight:sync {$slug}
 *    - Production (explicit + confirmed):
 *      php artisan insight:sync {$slug} --to=production
 *
 * 5. Delete this file when finished.
 *
 * After syncing, this file may be safely removed.
 */

return {$this->exportArray($export)};
PHP;

        file_put_contents($path, $php);

        $this->info("Insight exported to: {$path}");
        return Command::SUCCESS;
    }

    /**
     * Export array using short syntax with readable formatting.
     */
    protected function exportArray(array $array): string
    {
        return str_replace(
            ['array (', ')'],
            ['[', ']'],
            var_export($array, true)
        );
    }
}
