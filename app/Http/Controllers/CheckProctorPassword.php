<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Log;
use App\Models\Student;
use Illuminate\Http\Request;

class CheckProctorPassword extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		$exam = Exam::where('id', $request->exam_id)->first();
		// $proctorsEmployeeIds = Student::where('Type_ID', Student::PROCTOR)->pluck('employee_id')->toArray();
		// $proctorsEmployeeIds = array_map(function($employeeId){
		// 	return strtolower($employeeId);
		// },$proctorsEmployeeIds);
		
		//$proctorIsFound = in_array(strtolower($request->password), $proctorsEmployeeIds);
		$message = 'Proctor Found';
		$password = strtolower($request->password); ;
		$proctor = Student::where('Type_ID', Student::PROCTOR)->
		whereRaw('lower(employee_id) like (?)',["%{$password}%"])
		->first();
		
		// $proctor = Student::where('Type_ID', Student::PROCTOR)->whereIn('employee_id', [$request->password , strtolower($request->password)])->first();
		if ($proctor) {
			$message = 'Proctor Found: ' . $proctor->getFullName();
		}
		if (true) {
			Log::create([
				'instructor_id' => Auth('students')->user()->ID,
				'password' => $request->password
			]);
			return response()->json([
				'status' => true,
			//	'proctor_found'=>$proctorIsFound,
				'exam_id' => $exam->id,
				'proctor_name' => $proctor ? $proctor->getFullName() : '',
				'message' => $message,
			]);
		}

		return response()->json([
			'fail' => false,
			'exam_id' => $exam->id,

		]);
	}
}
