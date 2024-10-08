<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToZero;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name.en'=>['required','max:255'] ,
            'name.ar'=>'required|max:255' ,
            'description.en'=>['required','max:400'],
            'description.ar'=>'required|max:400' ,
            'category_id'=>['required', new NotEqualToZero(trans('lang.Please Select Category'))],
            'image'=>['image','mimes:jpg,jpeg,bmp,png'],
            'price'=>'required|numeric' ,
        ];
    }

    public function messages()
    {
        return [
            'name.en.required'=>trans('lang.You Have To Enter English Product Name') ,
            'name.en.max'=>trans('lang.Too Much Letters') ,
            'name.ar.required'=>trans('lang.You Have To Enter Arabic Product Name') ,
            'name.ar.max'=>trans('lang.Too Much Letters') ,
            'description.en.required'=>trans('lang.You Have To Enter English Product Description') ,
            'description.en.max'=>trans('lang.Too Much Letters') ,
            'description.ar.required'=>trans('lang.You Have To Enter Arabic Product Description') ,
            'description.ar.max'=>trans('lang.Too Much Letters') ,
            'price.required'=>trans('lang.Price Is Required')

        ];
    }
}
