<?php

namespace App\Http\Requests;

use App\Rules\NotEqualToZero;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamRequest extends FormRequest
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
			'title' => 'required',
			'pass_percentage' => 'required',
			'zoom_link' => 'required',
			'no_questions' => 'required|numeric',
			'students' => 'required',
			'start_date' => 'required',
			'course_type' => ['required', new NotEqualToZero('Please Select Course ')],
			'proctor' => ['required', new NotEqualToZero('Please Select Proctor ')],
			'duration' => ['required'],
			'completed_date' => 'sometimes|required',
			'provider' => 'sometimes|required',
			'stack' => 'required',
			'location' => 'required',
			'skill_score' => 'sometimes|numeric',
			//'stack_id'=>[new NotEqualToZero('Please Enter Subject')]
		];
	}
}
