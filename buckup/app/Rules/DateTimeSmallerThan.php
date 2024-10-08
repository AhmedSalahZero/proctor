<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateTimeSmallerThan implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $dateTime ;

    public function __construct($dateTime )
    {
        $this->dateTime = $dateTime ;
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
        if($this->dateTime)
        {
            return Carbon::make($value)->lessThanOrEqualTo($this->dateTime);
        }

        return true ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('lang.Incorrect DateTime Range');
    }
}
