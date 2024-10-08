<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use Illuminate\Http\Request;

class ProctorFilterCalendarController extends Controller
{
    public function __invoke(Request $request)
    {
         $exams = $request->user('students')->getUpcomingClasses() ?? [];
        
        $fullCalendarEvents = getCalendarEvents($exams , (array)$request->courses_id );
        return response()->json([
            'status'=>true,
            'fullCalendarEvents'=>$fullCalendarEvents ,
        ]);
        
    }
}
