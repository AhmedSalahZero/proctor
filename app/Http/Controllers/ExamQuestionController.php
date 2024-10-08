<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function create(Exam $exam)
    {
       return  view('backend.questions.crud')
            ->with('route',route('questions.store'));

    }
    public function edit(Exam $exam)
    {


//        return view('backend.questions.crud',array_merge(
//            [
//                'questions'=>$exam->questions ,
//                'route'=>route('exams.questions.update',[$exam->id,999999]) ,
//                'currentExam'=>$exam
//            ]
//        ));

    }

    public function update(Exam $exam , Request $request)
    {

//        $exam->deleteOldQuestions();
//
//        $exam->addQuestions($request);
//
//        return redirect()->route('exams.index')->with('success','Questions Has Been Update Successfully');

    }
}
