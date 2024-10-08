<?php

namespace App\Http\Requests;

use App\Models\Rule;
use App\Rules\NotEqualToZero;
use App\Rules\UniqueStringRule;
use App\Rules\ValueExistIn;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateRuleRequest extends FormRequest
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
            'name.en'=>['min:1|max:255',new UniqueStringRule(
                Str::slug($this->name['en']) , 'Rule','slug',trans('lang.This Rule Name Already Exist'),
                $this->id
            )],
            'name.ar'=>['min:1|max:255'],
            'type'=>['required', new NotEqualToZero(trans('lang.Please Select Rule Type')) , new ValueExistIn(Rule::rulesTypes(),trans('lang.This Rule Type Does Not Exist'))]

        ];
    }

    public function messages()
    {
        return [
            'name.en.min'=>trans('lang.This Field Can Not Be Empty') ,
            'name.en.max'=>trans('lang.Too Much Letters') ,
            'name.ar.min'=>trans('lang.This Field Can Not Be Empty') ,
            'name.ar.max'=>trans('lang.Too Much Letters') ,

        ];
    }
}
