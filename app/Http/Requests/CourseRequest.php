<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToZero;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'description'=>['required'] ,
        ];
    }
}
