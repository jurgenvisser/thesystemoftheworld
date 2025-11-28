<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class RateLimitedController extends Controller
{
    /**
     * Slaat een nieuw item op (bijv. een bericht of aanvraag), met rate limiting.
     * Dit is de methode die de POST-request van een formulier verwerkt.
     */
    public function store(Request $request)
    {
        // 1. Validatie van de inkomende data (BELANGRIJK!)
        // Pas deze validatie aan op basis van de velden in jouw formulier.
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        // 2. De Rate Limiter Sleutel Bepalen (User ID of IP)
        // Dit garandeert dat ingelogde admins een eigen limiet hebben, gescheiden van gasten.
        $key = 'submission:' . (Auth::id() ?? $request->ip());

        // 3. De Rate Limiter Uitvoeren: Max 5 pogingen per 120 seconden (2 minuten)
        $executed = RateLimiter::attempt(
            $key,
            $maxAttempts = 5, // Maximale pogingen
            function() use ($request) {
                // HIER KOMT DE SUCCESVOLLE LOGICA (bijv. opslaan in database of mailen)
                
                // Voorbeeld: Log de actie in de Laravel logs
                Log::info('RateLimited Actie succesvol uitgevoerd door: ' . $key);
                // Message::create(['user_id' => Auth::id(), 'content' => $request->message]);
            },
            $decaySeconds = 120 // Hoe lang moet de gebruiker wachten na overschrijding
        );

        // 4. Afhandeling van de resultaten
        if (!$executed) {
            // FOUT: Limiet bereikt
            $seconds = RateLimiter::availableIn($key); 
            
            return redirect()->back()->with('error', 
                "Je bent te snel! Gelieve $seconds seconden te wachten voordat je het opnieuw probeert. ⌛"
            );
        }

        // SUCCES: Actie uitgevoerd
        return redirect()->back()->with('success', 'Je bericht/aanvraag is succesvol verwerkt! 🎉');
    }

    // --- DE REST VAN DE RESOURCE METHODES (Placeholder) ---

    /**
     * Toon een lijst van items.
     */
    public function index()
    {
        // code
    }

    /**
     * Toon het formulier om een nieuw item aan te maken.
     */
    public function create()
    {
        // code
    }

    /**
     * Toon een specifiek item.
     */
    public function show(string $id)
    {
        // code
    }

    /**
     * Toon het formulier om een item te bewerken.
     */
    public function edit(string $id)
    {
        // code
    }

    /**
     * Werk een specifiek item bij.
     */
    public function update(Request $request, string $id)
    {
        // code
    }

    /**
     * Verwijder een specifiek item.
     */
    public function destroy(string $id)
    {
        // code
    }
}