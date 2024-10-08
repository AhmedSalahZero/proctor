<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValueExistIn implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $values , $message ;

    public function __construct(array $values , string $message)
    {
        $this->values = $values ;

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

        return in_array($value,$this->values);
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
