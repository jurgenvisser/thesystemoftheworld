<?php

namespace App\Http\Controllers;

class InsightController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $requestedId = $request->query('n'); // bijv: inzicht-1 of 1

        $data = json_decode(
            file_get_contents(resource_path('data/insights.json')),
            true
        );

        $insights = $data['insights'] ?? [];

        // Als er geen n is meegegeven: pak de eerste
        if (!$requestedId) {
            $insight = $insights[0] ?? null;
        } else {
            $insight = collect($insights)->first(function ($item) use ($requestedId) {
                // Sta toe: ?n=1 OF ?n=inzicht-1
                return $item['id'] === 'inzicht-' . $requestedId
                    || $item['id'] === $requestedId;
            });
        }

        abort_unless($insight, 404);

        return view('admin.insights.index', [
            'insight' => $insight,
            'insightNumber' => preg_replace('/[^0-9]/', '', $insight['id']),
        ]);
    }
}