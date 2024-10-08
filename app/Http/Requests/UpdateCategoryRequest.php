<?php

namespace App\Http\Requests;

use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
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
            'name.*en'=>'required|string|max:255' ,
            'name.*ar'=>'required|string|max:255',
            'slug'=>[new UniqueStringRule($this->name['en'] ,'Category','slug',trans('lang.This Category Name Already Exist .. Choose Another One'),$this->id)],
        ];
    }
}
