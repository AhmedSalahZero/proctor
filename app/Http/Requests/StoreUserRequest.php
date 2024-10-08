<?php

namespace App\Http\Requests;

use App\Rules\StringsEquality;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           'name'=>'required|max:255',
            'email'=>['required','unique:users,email'],
            'phone'=>['required','numeric'] ,
            'address'=>['required','max:255'] ,
//            'call_at'=>'required',
            'confirm_password'=>'required_with:password',
            'password'=>['sometimes',new StringsEquality($this->confirm_password)] ,
            ];
    }
    public function messages()
    {
        return [
            'name.required'=>trans('lang.User Name Is Required') ,
            'name.max'=>trans('lang.Too Much Letters')  ,
            'email.required'=>trans('lang.Email Address Is Required'),
            'email.unique'=>trans('lang.This Email Address Already Exist'),
            'phone.required'=>trans('lang.User Phone Is Required')  ,
            'phone.numeric'=>trans('lang.Invalid Phone Number .. Only Numeric Values Allowed'),
            'address.required'=>trans('lang.User Address Is Required') ,
            'address.max'=>trans('lang.Too Much Letters'),
//            'call_at.required'=>trans('lang.Calling Date And Time Is Required'),

        ];
    }

}
