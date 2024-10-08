<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToZero;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificationRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_type'=>['required',new NotEqualToZero('Please Choose Course Type')],
                    'student_id'=>['required',new NotEqualToZero('Please Choose Select Student')] ,
            
        ];
    }
}
