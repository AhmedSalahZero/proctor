<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassesController extends Controller
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
        $fullCalendarEvents = getCalendarEvents($exams , (array)$request->courses_id );
        
        return view('instructor.classes.index' , [
            'locations'=>$examsLocations ,
            'exams'=>$exams,
            'calendarEvents'=>$fullCalendarEvents
        ]);
    }
}
