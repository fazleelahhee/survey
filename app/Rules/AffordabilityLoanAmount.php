<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Collection;

class AffordabilityLoanAmount implements Rule
{
    private $payload;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Collection $payload)
    {
        $this->payload = $payload;
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
        return intval($value) < 3 * intval($this->payload->get('Annual Income')); 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute did not meet the threshold';
    }
}
