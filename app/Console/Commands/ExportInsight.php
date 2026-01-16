<?php

namespace App\Console\Commands;

use App\Models\Insight;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExportInsight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * We explicitly require a slug so we always know
     * which insight we are working on.
     */
    protected $signature = 'insight:export {slug}';

    /**
     * The console command description.
     */
    protected $description = 'Export an insight from the database to a temporary PHP file for editing and previewing';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $slug = $this->argument('slug');

        // 1. Fetch the insight from the database
        $insight = Insight::where('slug', $slug)->first();

        if (! $insight) {
            $this->error("Insight '{$slug}' not found in the database.");
            return Command::FAILURE;
        }

        // 2. Build the export payload
        // This structure mirrors what SyncInsight expects.
        $data = [
            'slug' => $insight->slug,
            'title' => $insight->title,
            'published' => $insight->published,
            'content' => [
                'subtitle' => $insight->content['subtitle'] ?? null,
                'sections' => $insight->content['sections'] ?? [],
            ],
        ];

        // 3. Determine export path
        $directory = resource_path('insights');
        $path = $directory . "/{$slug}.php";

        // 4. Ensure the directory exists
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // 5. Generate a readable PHP file with guidance comments
        $export = <<<PHP
<?php

/**
 * TEMPORARY WORK FILE — INSIGHT EXPORT
 *
 * Workflow:
 * 1. Edit this file
 * 2. Preview in browser via:
 *    /admin/inzichten/preview/{$slug}
 * 3. Sync back to database using:
 *    php artisan insight:sync {$slug}
 * 4. Delete this file when done
 *
 * Source of truth after sync: DATABASE
 */

return {$this->prettyExport($data)};
PHP;

        File::put($path, $export);

        $this->info("Insight '{$slug}' exported to:");
        $this->line($path);

        return Command::SUCCESS;
    }

    /**
     * Convert array to nicely formatted PHP code
     * using short array syntax [] instead of array().
     */
    protected function prettyExport(array $data): string
    {
        return $this->exportValue($data, 0);
    }

    protected function exportValue(mixed $value, int $indent): string
    {
        $space = str_repeat('    ', $indent);

        if (is_array($value)) {
            $isAssoc = array_keys($value) !== range(0, count($value) - 1);

            $lines = [];
            foreach ($value as $key => $val) {
                $formattedValue = $this->exportValue($val, $indent + 1);

                if ($isAssoc) {
                    $lines[] = str_repeat('    ', $indent + 1)
                        . var_export($key, true)
                        . ' => '
                        . $formattedValue
                        . ',';
                } else {
                    $lines[] = str_repeat('    ', $indent + 1)
                        . $formattedValue
                        . ',';
                }
            }

            return "[\n"
                . implode("\n", $lines)
                . "\n{$space}]";
        }

        return var_export($value, true);
    }
}
