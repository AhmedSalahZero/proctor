<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Log;
use App\Models\Student;
use App\Models\User_exam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewInstructorLogs extends Controller
{

    public function __invoke(Request $request)
    {
        $logs = Log::paginate($this->paginationNumber);

        // if(count($studentWithValidExams))
        // {
            return view('backend.logs.view',[
                'logs'=>$logs 
            ]);
        // }

        // return redirect()->back()->with('fail','No Current Exam Yet ');


//        $studentWithValidExamsIDS = User_exam::whereNull('Finished_At')->whereNotNull('exam_id')->load('students')->pluck('exam_id')->unique();
//
//        if(count($studentWithValidExamsIDS))
//        {
//            return view('backend.current_exams.view',[
//                'exams'=>Exam::whereIn('id',$studentWithValidExamsIDS)->get()
//            ]);
//
//
//        }
//
//        return redirect()->back()->with('Success','No Current Exam Yet ');

    }
}
