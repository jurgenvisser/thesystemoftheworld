<?php

namespace App\Services;

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;
use App\Models\SocialStat;

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
        <p>Welkom! Je bent nu onderdeel van The System.</p>
        <p>Dit is een plek waar mensen werken aan rust, helderheid en structuur in hun eigen tempo. Je hoeft niets voor te bereiden en je kan vandaag beginnen. </p>
        <p>Wil je meteen beginnen met onze community? <a href="https://thesystemoftheworld.com/bedankt-voor-jou-aanmelding?t=brevo">Krijg dan toegang via deze link: <strong>Discord Community</strong></a>.</p>
        <p>Kijk eerst rustig rond. En begin gelijk aan jou herstel.In deze mail vind je ook jouw antwoorden van de vragenlijst.</p>

        <br>
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
        <p><strong>Wat is je belangrijkste doel die jij wilt behalen de komende 6 maanden?</strong><br><em>{{BELANGRIJKSTE_DOEL}}</em></p>
        <p><strong>Heb je eerdere mentoring of begeleiding gehad?</strong><br><em>{{EERDERE_COACHING_GEHAD}}</em></p>
        <p><strong>Wat is jouw ervaring met mentoring of begeleiding?</strong><br><em>{{EERDERE_COACHING_ERVARING}}</em></p>
        <p><strong>Heb jij meer hulp nodig dan 12 maanden?</strong><br><em>{{WANNEER_SUCCES}}</em></p>

        <h2>Verwachting van The System</h2>
        <p><strong>Wat hoop jij te bereiken met onze dienstverlening?</strong><br><em>{{WAT_WIL_JE_BEREIKEN}}</em></p>
        <p><strong>Hoeveel tijd heb je nodig om jezelf terug te vinden?</strong><br><em>{{ONTWIKKELING_INVESTERING}}</em></p>
        <p><strong>Wat denk je dat jouw grootste struikelblok zal zijn binnen The System?</strong><br><em>{{GROOTSTE_STRUIKELBLOK}}</em></p>

        <h2>Marketing & Communicatie</h2>
        <p><strong>Ben jij geïnteresseerd in exclusieve tips, blogs en aanbiedingen via E-mail?</strong><br><em>{{MARKETING_VOORKEUR}}</em></p>

        <h2>Overige informatie</h2>
        <p><strong>Is er iets anders dat we moeten weten om je beter te kunnen helpen?</strong><br><em>{{ANDERE_BELANGRIJKE_INFORMATIE}}</em></p>
        
        <br>
        <h2>Klopt er iets niet?</h2>
        <p>Stuur dan een e-mail naar business@thesystemoftheworld.com en vertel ons wat we voor je kunnen doen!</p>

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
                '1' => 'Minder dan 2 maanden',
                '2' => '2-4 maanden',
                '3' => '4-6 maanden',
                '4' => 'Meer dan 6 maanden',
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
            'subject' => 'Bedankt dat jij ons hebt gekozen ' . ($formData['FIRSTNAME'] ?? 'Onbekend') . '!',
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