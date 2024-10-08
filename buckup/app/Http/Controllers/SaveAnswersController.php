<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class SaveAnswersController extends Controller
{

    public function __invoke(Request $request)
    {
        $exam = Exam::where('id',$request->input('test_id'))->first();

        $user = Auth('students')->user() ;

        $user_exam_id = $user->exams()->where('exams.id',$exam->id)->first()->pivot->ID;

       $userAnswer = UserAnswer::where('Test_ID',$user_exam_id)
            ->where('Question_ID',intval($request->input('question_id')))->first();

       if($userAnswer)
       {
//           dump('update');
           // Update It

           $userAnswer->update([
//               'Test_ID'=>$user_exam_id ,
//               'Question_ID'=>intval($request->input('question_id')) ,
               'Answer'=>intval($request->input('answer_id'))
           ]);
       }
       else
       {
//           dump('create');

           //Create New One

           UserAnswer::create([
               'Test_ID'=>$user_exam_id ,
               'Question_ID'=>intval($request->input('question_id')) ,
               'Answer'=>intval($request->input('answer_id'))
           ]);
       }
//       dd('good');


    }
}
