<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Student;
use Illuminate\Http\Request;

class DownloadSingleReport extends Controller
{

    public function __invoke( Certification $certification)
    {

        
        \PDF::loadView('backend.emails.score-report', [
            'download'=>true,
            'student'=>$certification->user ,
            'certification'=>$certification,
            'wrongAnswers'=>$certification->user->getRightAndWrongQuestions()
     
        ] , [

        ] )->download('Score Report'.'.pdf');
        return redirect()->back();

        // return view('backend.emails.score-report',[
        //     'download'=>true,
        //     'student'=>$certification->user ,
        //     'certification'=>$certification
        // ]);
    }
}
