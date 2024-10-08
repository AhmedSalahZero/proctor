<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchExamStudentRequest;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchExamStudents extends Controller
{

    public function __invoke(SearchExamStudentRequest $request)
    {
       $exam = Exam::where('id',$request->input('exam_id'))->firstOrFail();

       if($exam->hasStudents()){

           return view('backend.students.view',[
               'students'=>$exam->students()->simplePaginate($this->paginationNumber)
           ]) ;
       }

       return redirect()->back()->with('fail','Exam Does Not Has Any Student Yet !') ;
    }
}
