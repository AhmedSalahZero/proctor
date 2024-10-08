<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class ShowMyExamQuestions extends Controller
{

    public function __invoke(Request $request)
    {


        $student = Auth('students')->user();



        $exam = $request->user('students')->exams()->latest()->first() ;




        if(($isValidToEnterExam = $student->isValidToEnterExam() )['status']) {

            $request->user('students')->exams()->updateExistingPivot($exam->id , [
                'entered_at'=>now() ,
                'Done'=>true ,
            ]);

            $request->user('students')->exams->each(function(Exam $exam){
                if(!$exam->pivot->first_entered_at)
                {
                    $exam->pivot->first_entered_at = $exam->pivot->entered_at ;
                    $exam->pivot->save();
                }
            });
            $userExamID = $exam->pivot->ID;

            $certification = $exam->certifications->first() ;

            $userExamQuestionsIDS = UserAnswer::where('Test_ID',$userExamID)->get()->pluck('Question_ID');
//            $course_type = $certification->course_type;

//            $course_type = CourseType::where('id',$course_type)->first();

            $questions = Question::whereIn('ID',$userExamQuestionsIDS)->get()
            ->take($exam->no_questions );

//            dd($questions);


            if($questions->count()) {
                return view('frontend.exam' , [
                    'questions'=>$questions ,
                    'remaining_time'=>$exam->getRemainingTime($userExamID) ,
                    'exam'=>$exam,
                    'user_exam_id'=>$exam->pivot->ID
                ]);
            }
            return redirect()->back()->with('fail','No Questions Yet !');
        }

        Auth()->guard('students')->logout();
        if(Auth('admins')->check())
        {
            Auth('admins')->logout();
        }
        return redirect()->route('front.login.user')->with('fail',$isValidToEnterExam['reason']);
    }
}
