<?php

namespace App\Http\Requests;

use App\Models\Rule;
use App\Rules\NotEqualToZero;
use App\Rules\UniqueStringRule;
use App\Rules\ValueExistIn;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRuleRequest extends FormRequest
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
            'name.en'=>['required','max:255',new UniqueStringRule(str::slug($this->name['en']),'rule','slug',trans('lang.This Rule Name Already Exist'))] ,
            'name.ar'=>'required|max:255' ,
            'type'=>['required', new NotEqualToZero(trans('lang.Please Select Rule Type')) , new ValueExistIn(Rule::rulesTypes(),trans('lang.This Rule Type Does Not Exist'))]
        ];

    }

    public function messages()
    {
        return [
            'name.en.required'=>trans('lang.You Have To Enter English Rule Name') ,
            'name.en.max'=>trans('lang.Too Much Letters') ,
            'name.ar.required'=>trans('lang.You Have To Enter Arabic Rule Name') ,
            'name.ar.max'=>trans('lang.Too Much Letters') ,


        ];
    }
}
