<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use App\Models\UserResult;
use Illuminate\Http\Request;

class ViewStudentsScores extends Controller
{

    public function __invoke(Request $request)
    {

        return view('backend.scores.view',[
            'results'=>UserResult::onlyNotDeleted()->has('student')->with('student')->paginate($this->paginationNumber)
        ]);


//        return view('backend.scores.view',[
//            'certifications'=>Certification::with('user')->get()
//        ]);
    }
}
