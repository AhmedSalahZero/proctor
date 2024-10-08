<?php

namespace App\Http\Controllers;

use App\Jobs\SendExamMail;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentExamMail extends Controller
{

    public function __invoke(Request $request , Student $student)
    {
        $exam = Exam::where('id',$request->input('exam_id'))->first();

        SendExamMail::dispatch($student,$exam)->delay($this->mailDelayTime());

        return redirect()->route('students.index')->with('success','Mail Has Been Sent Successfully To '. $student->User_Name);


    }
}
