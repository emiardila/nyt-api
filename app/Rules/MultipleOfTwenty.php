<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MultipleOfTwenty implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        return $value % 20 === 0;
    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The :attribute must be a multiple of 20.';
    }
}
