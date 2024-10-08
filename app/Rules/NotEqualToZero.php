<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotEqualToZero implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $message ;

    public function __construct(string $message)
    {
        $this->message = $message ;
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
       return  $value !== '0' ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
