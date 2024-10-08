<?php

namespace App\Http\Requests;
use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest ;
use Illuminate\Support\Str;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true ;
    }

    public function rules()
    {
        return [
            'name.en'=>['required','max:255',new UniqueStringRule(str::slug($this->name['en']),'Permission','slug',trans('lang.This Permission Name Already Exist'))] ,
            'name.ar'=>'required|max:255' ,

        ];
    }

    public function messages()
    {
        return
            [
                'name.en.required'=>trans('lang.You Have To Enter English Permission Name') ,
                'name.en.max'=>trans('lang.Too Much Letters') ,
                'name.ar.required'=>trans('lang.You Have To Enter Arabic Permission Name') ,
                'name.ar.max'=>trans('lang.Too Much Letters') ,
            ];
    }
}
