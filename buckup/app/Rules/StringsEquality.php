<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringsEquality implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $field , $message , $str;

    public function __construct($str)
    {
        $this->str = $str ;
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
        return $value === $this->str ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('lang.Two Fields Are Not Matched');
    }
}
