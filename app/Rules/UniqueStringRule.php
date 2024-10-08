<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueStringRule implements Rule
{
    /**
     * Create a new rules instance.
     *
     * @return void
     */

    private $string , $table , $column , $message ,$id;

    public function __construct($string , $table , $column , $message,$id=null)
    {
        $this->string = $string ;
        $this->table = $table  ;
        $this->column = $column ;
        $this->message = $message ;
        $this->id = $id ; // To Except This Rule From Uniqueness
    }

    /**
     * Determine if the validation rules passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $query = ("\App\Models\\".$this->table)::where($this->column , $this->string) ;

        if($this->id) {
            $query->where('id','!=',$this->id);
        }

        return ! $query->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ;
    }
}
