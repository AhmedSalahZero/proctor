<?php

namespace App\Http\Requests;

use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateMediaRequest extends FormRequest
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
            'name.en'=>['required','max:255',new UniqueStringRule(str::slug($this->name['en']),'Media','slug',trans('lang.This Media Name Already Exist'),$this->id)] ,
            'name.ar'=>'required|max:255' ,
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
