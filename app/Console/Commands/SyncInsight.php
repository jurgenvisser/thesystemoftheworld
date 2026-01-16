<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Insight;

class SyncInsight extends Command
{
    /**
     * De naam + argument
     */
    protected $signature = 'insight:sync {slug}';

    /**
     * Beschrijving
     */
    protected $description = 'Sync een inzicht vanuit resources/insights naar de database';

    public function handle()
    {
        $slug = $this->argument('slug');

        // 1. Bouw het pad naar het file
        $path = resource_path("insights/{$slug}.php");

        // 2. Bestaat het file?
        if (! file_exists($path)) {
            $this->error("Insight file niet gevonden: {$path}");
            return Command::FAILURE;
        }

        // 3. Laad de data (FRESH, geen cache)
        $data = require $path;

        // 4. Minimale validatie (bewust simpel)
        foreach (['slug', 'title', 'content'] as $key) {
            if (! array_key_exists($key, $data)) {
                $this->error("Key '{$key}' ontbreekt in {$slug}.php");
                return Command::FAILURE;
            }
        }

        // 5. Update of create
        $insight = Insight::updateOrCreate(
            ['slug' => $data['slug']],
            $data
        );

        // 6. Feedback
        $this->info("Insight '{$insight->slug}' gesynchroniseerd.");
        $this->line("Titel: {$insight->title}");
        $this->line("Published: " . ($insight->published ? 'ja' : 'nee'));

        return Command::SUCCESS;
    }
}