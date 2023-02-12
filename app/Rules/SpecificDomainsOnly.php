<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SpecificDomainsOnly implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $domain = substr($value, strpos($value, '@') + 1);

        $domains = [
            'namria.gov.ph',
        ];

        return in_array($domain, $domains);
    }

    public function message()
    {
        return 'Email must be a NAMRIA domain (@namria.gov.ph)';
    }
}
