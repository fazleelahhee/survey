<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BorrowerAge implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($payload = null)
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value > 21 && $value < 75;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute age  does not fullfill the rquirement';
    }
}
