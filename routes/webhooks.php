<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

Route::post('/brevo-webhook', function (Request $request) {
    // Log de hele payload
    Log::info('Raw Brevo webhook payload:', $request->all());
    // Token check
    $authHeader = $request->header('Authorization');
    $validToken = env('BREVO_WEBHOOK_TOKEN');

    if ($authHeader !== $validToken) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Form data ophalen
    $formData = $request->input('contact_properties', []);

    // Velden mappen
    $mappedData = [
        'FIRSTNAME' => $formData['FIRSTNAME'] ?? '',
        'LASTNAME' => $formData['LASTNAME'] ?? '',
        'SMS' => $formData['SMS'] ?? '',
        'EMAIL' => $formData['EMAIL'] ?? '',
        'AGE' => $formData['AGE'] ?? '',
        'BIRTHDAY' => $formData['BIRTHDAY'] ?? '',
        'CITY' => $formData['CITY'] ?? '',
        'GROOTSTE_UITDAGING' => $formData['GROOTSTE_UITDAGING'] ?? '',
        'HUIDIGE_MENTALE_EMOTIONELE_WELZIJN' => $formData['HUIDIGE_MENTALE_EMOTIONELE_WELIJZN'] ?? '',
        'BELANGRIJKSTE_DOEL' => $formData['BELANGRIJKSTE_DOEL'] ?? '',
        'EERDERE_COACHING_GEHAD' => $formData['EERDERE_COACHING_GEHAD'] ?? '',
        'EERDERE_COACHING_ERVARING' => $formData['EERDERE_COACHING_ERVARING'] ?? '',
        'WANNEER_SUCCES' => $formData['WANNEER_SUCCES'] ?? '',
        'WAT_WIL_JE_BEREIKEN' => $formData['WAT_WIL_JE_BEREIKEN'] ?? '',
        'ONTWIKKELING_INVESTERING' => $formData['ONTWIKKELING_INVESTERING'] ?? '',
        'WELKE_COACHINGSTIJL' => $formData['WELKE_COACHINGSTIJL'] ?? '',
        'GROOTSTE_STRUIKELBLOK' => $formData['GROOTSTE_STRUIKELBLOK'] ?? '',
        'MARKETING_VOORKEUR' => $formData['MARKETING_VOORKEUR'] ?? '',
        'ANDERE_BELANGRIJKE_INFORMATIE' => $formData['ANDERE_BELANGRIJKE_INFORMATIE'] ?? ''
    ];

    \Log::info('Mapped data for email:', $mappedData);

    $emailService = new \App\Services\SendFormEmail();
    $recipients = [
        'limitedjqc@gmail.com',
        'business@thesystemoftheworld.com',
        $formData['EMAIL'] ?? null,
    ];
    $results = [];
    foreach ($recipients as $recipient) {
        $results[] = $emailService->send($mappedData, $recipient, 'Team The System');
    }

    return response()->json($results);
});