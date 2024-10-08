<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User_exam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class getUsersExams extends Controller
{
    public function __invoke()
    {
        $todayExams = Exam::whereDate('start_date',Carbon::today())->pluck('id');
        
         $filterData = User_exam::
        whereNotNull('entered_at')
        ->whereIn('exam_id',$todayExams);

        $allFilterDataCounter = $filterData->count();
        $currentUser = 1 ; 
        $datePerPage = $filterData->skip(Request('start'))->take(10)->get()->each(function($user_exam) use(&$currentUser){
            $user_exam->order = $currentUser ;
            $currentUser = $currentUser + 1 ;
            
            $user_exam->studentName = $user_exam->student ? $user_exam->student->User_Name : 'N/A';
            $user_exam->entered_at = $user_exam->entered_at ? \Carbon\Carbon::make($user_exam->entered_at)->format('M d , Y g:i A') : '';
            
            $user_exam->no_questions = 
            
             \App\Models\Exam::where('id',$user_exam->exam_id)->first()->no_questions ;
             $user_exam->no_answers =  \App\Models\UserAnswer::where('Test_ID',$user_exam->ID)->whereNotNull('Answer')->count();
             $user_exam->subject =  

             $user_exam->student && $user_exam->exam && $user_exam->student->certifications()->where('exam_id',$user_exam->exam->id)->first() && $user_exam->student->certifications()->where('exam_id',$user_exam->exam->id)->first()->course ?
             $user_exam->student->certifications()->where('exam_id',$user_exam->exam->id)->first()->course->name : 'N/A';
             
            
            
        }) ;

        return [
            'data'=>$datePerPage ,
            "draw"=> (int)Request('draw'),
            "recordsTotal"=> User_exam::count(),
            "recordsFiltered"=>$allFilterDataCounter,
        ] ;
    }
}
