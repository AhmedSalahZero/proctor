<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AnalysisClassesController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->ajax())
        
        {

            $exams = Arr::flatten($request->user('students')->getUpcomingClasses());
            
        }
        else{
            $exams = [];
        }
        $courses_id = array_filter((array)$request->courses_id);
        if(count($courses_id))
        {
         
                $exams = array_filter($exams , function($exam) use ($courses_id){
                return in_array($exam['course_type'] , $courses_id );
            });
        }
        if($request->filled('date_from'))
        {
                $exams = array_filter($exams , function($exam) use ($request){
                $filterFromDate = Carbon::make($request->date_from);
                return Carbon::make($exam['start_date'])->greaterThanOrEqualTo($filterFromDate);
            }) ;
            
        }
        if($request->filled('date_to'))
        {
            
             $exams = array_filter($exams , function($exam) use ($request){
                $filterFromDate = Carbon::make($request->date_from);
                return Carbon::make($exam['start_date'])->addMinutes($exam['duration'])->lessThanOrEqualTo($filterFromDate);
            }) ;
        }
        $chartData = [];
    
        if($request->ajax())
        {
            $chartData = getClassesChartData($exams , $request->time_period);
            return response()->json([
                'status'=>true , 
                'exams'=>$exams , 
                'chartData'=>$chartData ,
                'statistics'=>getClassesStatistics($exams)
            ]);
            
        }
        return view('instructor.analytics.classes', [
            'exams'=>$exams,
            'chartData'=>$chartData
        ]) ;
    }
}
