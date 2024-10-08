<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Certification;
use App\Models\Exam;

class DownloadSingleRoster extends Controller
{

    public function __invoke(Exam $exam)
    {
        $certification = $exam->students()->first()->certifications->last() ;

        \PDF::loadView('backend.roster_report', [
            'students'=>$exam->students ,
            'exam'=>$exam ,
            'certification'=> $certification
     
        ] , [

        ] )->download($exam->title.' Roster.pdf');
        return redirect()->back();

    }
}
