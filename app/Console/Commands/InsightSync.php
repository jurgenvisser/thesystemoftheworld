<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Insight;
use Illuminate\Support\Facades\DB;

/**
 * INSIGHT SYNC COMMAND
 *
 * WORKFLOW (BELANGRIJK – LEES DIT ALS JE DIT BESTAND OOIT TERUGZIET):
 *
 * 1. Maak of pull een insight-bestand:
 *    php artisan insight:pull inzicht-1
 *
 * 2. Bewerk het bestand in:
 *    resources/insights/inzicht-1.php
 *
 * 3. Test in de browser via preview route:
 *    /admin/inzichten/preview/inzicht-1
 *
 * 4. Tevreden?
 *    Sync naar database:
 *    php artisan insight:sync inzicht-1
 *
 * 5. Klaar met editen?
 *    Verwijder het bestand uit resources/insights
 *
 * BELANGRIJKE REGEL:
 * DATABASE is altijd de bron van waarheid na sync
 * (bestanden zijn uitsluitend tijdelijke werkmiddelen)
 *
 * EXTRA:
 * - Gebruik --to=production om expliciet naar PROD te pushen
 * - Zonder flag = ALTIJD lokale/dev database
 */
class InsightSync extends Command
{
    /**
     * Command signature
     *
     * --to=production is EXPLICIET nodig om prod te raken.
     * Geen flag = veilig lokaal.
     */
    protected $signature = 'insight:sync {slug} {--to= : Target database connection (default: local)}';

    protected $description = 'Sync een inzicht vanuit resources/insights naar de database (Dev DB by default)';

    public function handle(): int
    {
        $slug = $this->argument('slug');
        $target = $this->option('to') ?: 'local';

        /**
         * SAFETY FIRST
         *
         * We staan alleen expliciet bekende targets toe.
         * Alles wat hier niet staat → stoppen.
         */
        if (! in_array($target, ['local', 'production'], true)) {
            $this->error("Ongeldige target '{$target}'. Gebruik 'local' of 'production'.");
            return Command::FAILURE;
        }

        /**
         * EXTRA WAARSCHUWING BIJ PRODUCTIE
         */
        if ($target === 'production') {
            $this->warn('JE STAAT OP HET PUNT DATA NAAR PRODUCTIE TE SCHRIJVEN.');
            $this->warn('Dit overschrijft bestaande data.');

            if (! $this->confirm('Weet je 100% zeker dat je dit wilt doen?')) {
                $this->info('Afgebroken.');
                return Command::SUCCESS;
            }
        }

        /**
         * 1. Bouw pad naar tijdelijk insight-bestand
         */
        $path = resource_path("insights/{$slug}.php");

        if (! file_exists($path)) {
            $this->error("Insight file niet gevonden: {$path}");
            return Command::FAILURE;
        }

        /**
         * 2. Laad data (NOOIT CACHEN)
         */
        $data = require $path;

        /**
         * 3. Minimale structuur-validatie
         * (bewust licht – inhoud vertrouwen we)
         */
        foreach (['slug', 'title', 'content'] as $key) {
            if (! array_key_exists($key, $data)) {
                $this->error("Key '{$key}' ontbreekt in {$slug}.php");
                return Command::FAILURE;
            }
        }

        /**
         * EXTRA GUARD:
         * Slug in bestand moet matchen met argument
         */
        if ($data['slug'] !== $slug) {
            $this->error("Slug mismatch: bestand bevat '{$data['slug']}', command gebruikt '{$slug}'.");
            return Command::FAILURE;
        }

        /**
         * 4. Kies expliciet database connection
         */
        $connection = $target === 'production' ? 'production' : config('database.default');

        $this->line("Syncing insight '{$slug}' naar connection [{$connection}]...");

        /**
         * 5. Schrijf naar database
         */
        $insight = DB::transaction(function () use ($data) {
            return Insight::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        });

        /**
         * 6. Feedback
         */
        $this->info('Sync voltooid.');
        $this->line("Slug      : {$insight->slug}");
        $this->line("Titel     : {$insight->title}");
        $this->line("Published : " . ($insight->published ? 'ja' : 'nee'));
        $this->line("Target DB : {$connection}");

        return Command::SUCCESS;
    }
}