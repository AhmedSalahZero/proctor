<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use Illuminate\Http\Request;

class FilterScores extends Controller
{

    public function __invoke(Request $request)
    {
        $exam = Exam::where('id',$request->input('exam_id'))->first();

        return view('backend.scores.view',[
            'certifications'=>$exam ? $exam->certifications : Certification::all()
        ]);
    }
}
