<?php

namespace App\Http\Controllers;

class InsightController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        // 1. Lees het nummer uit de query (?n=1)
        $number = $request->query('n', 1);

        // 2. Bouw de slug (inzicht-1, inzicht-2, etc.)
        $slug = 'inzicht-' . $number;

        // 3. Haal het insight-record op uit de database
        $insight = \App\Models\Insight::where('slug', $slug)->first();

        // 4. Bestaat het niet? Dan 404
        abort_unless($insight, 404);

        // 5. Stuur het insight-object naar de view
        return view('admin.insights.index', [
            'insight' => $insight,
            'insightNumber' => $number,
        ]);
    }
}