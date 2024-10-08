<?php

namespace App\Http\Controllers;

use App\Models\Certification;

class ViewSingleReport extends Controller
{
    public function __invoke(Certification $certification)
    {

// dd($certification->user->getRightAndWrongQuestions());
        return view('backend.emails.score-report',
        [
            'student'       =>  $certification->user,
            'certification' =>  $certification,
            'wrongAnswers'=>$certification->user->getRightAndWrongQuestions()
        ]);
    }
}
