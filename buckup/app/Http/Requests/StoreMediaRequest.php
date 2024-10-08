<?php

namespace App\Http\Requests;

use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreMediaRequest extends FormRequest
{
    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        return [
            'name.en'=>['required','max:255',new UniqueStringRule(str::slug($this->name['en']),'Media','slug',trans('lang.This Media Name Already Exist'))] ,
            'name.ar'=>'required|max:255' ,

        ];
    }

    public function messages()
    {
        return
            [
            'name.en.required'=>trans('lang.You Have To Enter English Media Name') ,
            'name.en.max'=>trans('lang.Too Much Letters') ,
            'name.ar.required'=>trans('lang.You Have To Enter Arabic Media Name') ,
            'name.ar.max'=>trans('lang.Too Much Letters') ,
            ];
    }
}
