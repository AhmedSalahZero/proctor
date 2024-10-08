<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use App\Models\User_exam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewCurrentExams extends Controller
{

    public function __invoke(Request $request)
    {
        $todayExams = Exam::whereDate('start_date',Carbon::today())->pluck('id')
        ;
        // dd($todayExams);

        $studentWithValidExams = User_exam::
        whereNotNull('entered_at')
        ->whereIn('exam_id',$todayExams)
        ->paginate($this->paginationNumber);

        // if(count($studentWithValidExams))
        // {
            return view('backend.current_exams.view',[
                'user_exams'=>$studentWithValidExams ,
                'model'=>$studentWithValidExams
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
