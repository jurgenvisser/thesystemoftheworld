<?php

/**
 * TEMPORARY WORK FILE — INSIGHT EXPORT
 *
 * Workflow:
 * 1. Edit this file
 * 2. Preview in browser via:
 *    /admin/inzichten/preview/inzicht-2
 * 3. Sync back to database using:
 *    php artisan insight:sync inzicht-2
 * 4. Delete this file when done
 *
 * Source of truth after sync: DATABASE
 */

return [
    'slug' => 'inzicht-2',
    'title' => 'Test inzicht twee',
    'published' => true,
    'content' => [
        'subtitle' => 'Dit is een test-inzicht om de workflow te oefenen.',
        'sections' => [
            [
                'id' => '2.0',
                'title' => 'Testsectie',
                'blocks' => [
                    [
                        'type' => 'content',
                        'value' => 'Als je dit ziet, werkt de preview-route correct.',
                    ],
                ],
            ],
        ],
    ],
];