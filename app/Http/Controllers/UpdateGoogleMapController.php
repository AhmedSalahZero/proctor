<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class UpdateGoogleMapController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $timeFrame = $request->get('timeFrame');
        $intervalType = explode(' ' , $timeFrame)[1]; // weeks ,  months , $years 
        $interval = explode(' ' , $timeFrame)[0]; // 1 , 2 .. etc  
        
        $reportType = $request->get('reportType');
        $method = explode(' ' , $reportType)[0]  //add or sub 
        ;$type = explode(' ' , $reportType)[1] ; //classes or exams

        
        $instructor = $request->user('students');
        $methodName = $method.$intervalType; // addWeeks
        $searchIntervalDate = now()->$methodName($interval);
        $locations = [];
        
        $exams = Exam::where('instructor_id' , $instructor->ID)->where('start_date' ,'>=' , now())
        ->where('start_date' ,'<=' , $searchIntervalDate)
        ->get();
        foreach($exams as $exam)
        {
            $locations[] = [
                'lat'=>$exam->country->latitude,
                'lng'=>$exam->country->longitude,
            ];           
        }
        return response()->json([
            'locations'=>$locations
        ]);
    }
}
