<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Full_Name'=>'required',
            'Email'=>'required',
            'Phone'=>'required|numeric',
            // 'password'=>'sometimes|required|confirmed',
            'image'=>'sometimes|required|image|mimes:png,jpg,jpeg,svg'
        ];
    }

    public function messages(){
        return [
            'Full_Name.required'=>'Full Name Is Required',
            'Email.required'=>'Email Is Required',
            'Phone.required'=>'Phone Is Required',
            'Phone.numeric'=>'Phone Must Be Numeric',
            'image.image'=>__('Invalid Image Type'),
            'image.mimes'=>__('This Image Type Is Not Supported')
        ];
    }
}
