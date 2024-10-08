<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToZero;
use App\Rules\StringsEquality;
use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
        return array_merge(
            ['Full_Name'=>['required'],

            'Type_ID'=>['required', new NotEqualToZero('Please Select User Type')],
            'Email'=>['required', new UniqueStringRule($this->email, 'Student', 'email', 'This Email Already Exist', $this->ID)],
            'Phone'=>['required', 'numeric'],
            'Password'=>['sometimes'],
            'course_type'=>['required',new NotEqualToZero('Please Select Course ')],
                'employee_id'=>'sometimes|nullable|unique:users,employee_id,'.$this->ID,
                'image'=>'sometimes|nullable|image',] ,
                
                getInstructorCertificationRules()
                );
        
    }

    public function messages()
    {
        return array_merge([
			'Full_Name.required'=>'Please Enter First Name',
            'name.required'=>'User Name Is Required',
            'name.max'=>'Too Much Letters',
            'basic_email.required'=>'Email Address Is Required',
            'phone.required'=>'User Phone Is Required',
            'phone.numeric'=>'Invalid Phone Number .. Only Numeric Values Allowed',
            'address.required'=>'User Address Is Required',
            'address.max'=>'Too Much Letters',
            'image.image'=>__('Invalid Image')
        ] , 
        getInstructorCertificationMessage()
        
        );
    }
}
