<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RealEmailDomain implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Liste von bekannten Wegwerf-E-Mail-Domains
        $disposableDomains = [
            '10minutemail.com',
            '10minutemail.net',
            'guerrillamail.com',
            'guerrillamail.net',
            'guerrillamailblock.com',
            'sharklasers.com',
            'spam4.me',
            'grr.la',
            'guerrillamail.biz',
            'guerrillamail.de',
            'mailinator.com',
            'trashmail.com',
            'tempmail.com',
            'temp-mail.org',
            'throwaway.email',
            'yopmail.com',
            'maildrop.cc',
            'getnada.com',
            'fakeinbox.com',
            'dispostable.com',
            'throwawaymail.com',
            'tempinbox.com',
            'mohmal.com',
            'mytemp.email',
            'emailondeck.com',
        ];

        // Extrahiere die Domain aus der E-Mail-Adresse
        $emailParts = explode('@', $value);
        if (count($emailParts) !== 2) {
            $fail('Die E-Mail-Adresse muss eine gültige Domain enthalten.');
            return;
        }

        $domain = strtolower($emailParts[1]);

        // Prüfe ob es eine Wegwerf-E-Mail ist
        if (in_array($domain, $disposableDomains)) {
            $fail('Bitte verwende eine echte E-Mail-Adresse. Wegwerf-E-Mail-Adressen sind nicht erlaubt. Nutze eine Adresse von einem bekannten Anbieter wie Gmail, Outlook, Bluewin, GMX, etc.');
            return;
        }

        // Prüfe ob die Domain MX-Records hat (echte E-Mail-Domain)
        if (!checkdnsrr($domain, 'MX') && !checkdnsrr($domain, 'A')) {
            $fail('Die E-Mail-Domain existiert nicht. Bitte überprüfe deine E-Mail-Adresse und verwende eine gültige Adresse von einem echten E-Mail-Anbieter.');
            return;
        }
    }
}

