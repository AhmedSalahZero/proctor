<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $examsLocations = $request->user('students')->instructorExams->pluck('longitude','latitude') ?? [] ;
        $examsLocations = formatExamLocations($examsLocations);
        $exams = $request->user('students')->getUpcomingClasses() ?? [];
		// dd($examsLocations,$exams);
        
        return view('instructor.home.index' , [
            'locations'=>$examsLocations ,
            'exams'=>$exams 
        ]);
    }
}
