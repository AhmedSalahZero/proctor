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
        $exam = Exam::where('id',$request->exam_id)->first();
        $proctor = Student::where('ID' , $exam->proctor)->first();
        if($proctor->employee_id == $request->password)
        {   
            return response()->json([
                'status'=>true , 
                'exam_id'=>$exam->id,
                'proctor_name'=>$proctor->getFullName()
            ]);
        }
        Log::create([
            'instructor_id'=>Auth('students')->user()->ID ,
            'password'=>$request->password
        ]);
        
        return response()->json([
            'fail'=>false,
            'exam_id'=>$exam->id,

        ]);
        
    }
}
