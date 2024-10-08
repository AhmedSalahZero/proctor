<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class SearchExamController extends Controller
{

    public function __invoke(Request $request)
    {
        $searchWord = $request->input('search');
        
        // if(Auth('students')->user()->isProctor())
        // {
        //     $viewName = 'backend.proctors.view';

        // }
        // else  
        // {

        //     $viewName = 'backend.exams.view';
        // }
        if(ctype_digit($searchWord)) {
           

           return view('backend.exams.view',[
                'exams'=>Exam::where('id',$searchWord)->simplePaginate($this->paginationNumber)
            ]);
        }
        return view('backend.exams.view',[
            'exams'=>Exam::where('title','like',"%$searchWord%")->with('students')->simplePaginate($this->paginationNumber)
        ]);


    }
}
