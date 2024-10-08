<?php

namespace App\Http\Requests;

use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePermissionRquest extends FormRequest
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
                Str::slug($this->name['en']) , 'Permission','slug',trans('lang.This Rule Name Already Exist'),
                $this->id
            )],
            'name.ar'=>['min:1|max:255'],
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
