<?php

namespace App\Services;

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;

class SendFormEmail
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $this->apiInstance = new TransactionalEmailsApi(
            new \GuzzleHttp\Client(),
            $config
        );
    }

    /**
     * Verstuur de formulier e-mail
     *
     * @param array $formData Associatieve array met alle formuliervelden
     * @param string $toEmail E-mailadres van ontvanger (bijv. team)
     * @param string $toName Naam van ontvanger
     */
    public function send(array $formData, string $toEmail, string $toName = 'Team The System')
    {
        // HTML template als string of vanaf een file
        $htmlContent = '
        <html>
        <body>
        <p><strong>{{FIRSTNAME}} {{LASTNAME}}</strong> heeft zich aangemeld voor een coaching traject. Hier zijn de antwoorden van de vragenlijst. Je kunt ze bereiken op <em>{{SMS}}</em>.</p>

        <h2>Persoonlijke gegevens</h2>
        <p><strong>Naam:</strong> <em>{{FIRSTNAME}} {{LASTNAME}}</em><br>
        <strong>Telefoonnummer:</strong> <em>{{SMS}}</em><br>
        <strong>Email:</strong> <em>{{EMAIL}}</em><br>
        <strong>Leeftijd:</strong> <em>{{AGE}}</em><br>
        <strong>Geboortedatum:</strong> <em>{{BIRTHDAY}}</em><br>
        <strong>Woonplaats:</strong> <em>{{CITY}}</em></p>

        <h2>Huidige situatie</h2>
        <p><strong>Wat is momenteel de grootste uitdaging in jouw leven?</strong><br><em>{{GROOTSTE_UITDAGING}}</em></p>
        <p><strong>Hoe zou jij je huidige mentale en emotionele welzijn beschrijven?</strong><br><em>{{HUIDIGE_MENTALE_EMOTIONELE_WELZIJN}}</em></p>
        <p><strong>Wat is je belangrijkste doel voor de komende 6 maanden?</strong><br><em>{{BELANGRIJKSTE_DOEL}}</em></p>
        <p><strong>Heb je eerdere coaching of begeleiding gehad?</strong><br><em>{{EERDERE_COACHING_GEHAD}}</em></p>
        <p><strong>Wat is jouw ervaring met coaching of begeleiding?</strong><br><em>{{EERDERE_COACHING_ERVARING}}</em></p>
        <p><strong>Wanneer ga je het als succes beschouwen?</strong><br><em>{{WANNEER_SUCCES}}</em></p>

        <h2>Verwachting van The System</h2>
        <p><strong>Wat hoop jij te bereiken met ons coachingstraject?</strong><br><em>{{WAT_WIL_JE_BEREIKEN}}</em></p>
        <p><strong>Hoeveel tijd kun jij per week investeren in je persoonlijke ontwikkeling?</strong><br><em>{{ONTWIKKELING_INVESTERING}}</em></p>
        <p><strong>Welke coachingstijl past het beste bij jou?</strong><br><em>{{WELKE_COACHINGSTIJL}}</em></p>
        <p><strong>Wat denk je dat jouw grootste struikelblok zal zijn tijdens het traject?</strong><br><em>{{GROOTSTE_STRUIKELBLOK}}</em></p>

        <h2>Marketing & Communicatie</h2>
        <p><strong>Ben jij geïnteresseerd in exclusieve tips, blogs en aanbiedingen via E-mail?</strong><br><em>{{MARKETING_VOORKEUR}}</em></p>

        <h2>Overige informatie</h2>
        <p><strong>Is er iets anders dat we moeten weten om je beter te kunnen helpen?</strong><br><em>{{ANDERE_BELANGRIJKE_INFORMATIE}}</em></p>
        
        <br><br>
        <h1>Keep It Up! 🍀♟️</h2>
        <p><em>"Je hoeft niet meer alleen te lopen, dat hebben wij al voor je gedaan!"</em> - The System</p>
        </body>
        </html>
        ';

        // Mapping arrays voor velden met numerieke codes
        $fieldMappings = [
            'EERDERE_COACHING_GEHAD' => [
                '1' => 'Ja',
                '2' => 'Nee',
            ],
            'ONTWIKKELING_INVESTERING' => [
                '1' => 'Minder dan 2 uur',
                '2' => '2-4 uur',
                '3' => '4-6 uur',
                '4' => 'Meer dan 6 uur',
            ],
            'WELKE_COACHINGSTIJL' => [
                '1' => 'Praktisch en resultaatgericht',
                '2' => 'Reflectief en inzichtgevend',
                '3' => 'Ondersteunend en empathisch',
                '4' => 'Streng en direct',
            ],
        ];

        // Zet numerieke waarden om naar leesbare tekst
        foreach ($fieldMappings as $field => $mapping) {
            if (isset($formData[$field]) && isset($mapping[$formData[$field]])) {
                $formData[$field] = $mapping[$formData[$field]];
            }
        }

        // Vervang placeholders met formulierdata
        foreach ($formData as $key => $value) {
            $htmlContent = str_replace('{{' . $key . '}}', $value, $htmlContent);
        }

        // Email versturen
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Nieuwe intake via Brevo',
            'sender' => ['name' => 'The System - Aanmeldingen', 'email' => 'admin@thesystemoftheworld.com'],
            'to' => [
                ['email' => $toEmail, 'name' => $toName]
            ],
            'htmlContent' => $htmlContent,
        ]);

        try {
            $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            return [
                'status' => 'success',
                'message_id' => $result->getMessageId()
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message_id' => 'Fout bij versturen: ' . $e->getMessage()
            ];
        }
    }
}