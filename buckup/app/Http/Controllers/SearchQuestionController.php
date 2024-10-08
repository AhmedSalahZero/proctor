<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchQuestionController extends Controller
{

    public function __invoke(Request $request)
    {
        $searchWord = "%"  . $request->get('search') . "%";

        return view('backend.questions.view',[
            'questions'=>
            // 'exams'=>Question::where('title','like',"%$searchWord%")
            Question::whereHas('answers')
            ->where(function(Builder $builder) use ($searchWord){
                $builder->where('Question','like',$searchWord)
                ->orWhereHas('course_type' , function(Builder $builder) use ($searchWord){
                    $builder->where('name','like',$searchWord);
                });
            })
            ->with('answers')->paginate($this->paginationNumber)
        ]);


    }
}
