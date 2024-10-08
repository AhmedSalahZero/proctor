<?php

namespace App\Http\Requests;

use App\Rules\DateTimeSmallerThan;
use App\Rules\FilterDateRule;
use Illuminate\Foundation\Http\FormRequest;

class FilterCertificationRequest extends FormRequest
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
            'from'=>[new FilterDateRule()] ,
//            'to'=>[new FilterDateRule()]
        ];
    }
}
