<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->ajax())
        {
            $exams = $request->user('students')->getUpcomingClasses()['past'];
            
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
      
        $chartData = getCoursesChartData($request,$exams);
        if($request->ajax())
        {
            foreach($exams as $exam)
            {
                $examCounts = $exam->getTraineesCountWithAllStatus() ;
                $exam->course_name = $exam->getCourseName();
                $exam->exam_all_count =$examCounts['all']['count'];
                $exam->exam_passed_count =$examCounts['passed']['count'];
                $exam->exam_failed_count =$examCounts['failed']['count'];
                $exam->exam_passed_rate =$examCounts['passed']['rate'];
                $exam->exam_all_avg_score =$examCounts['all']['avg_score'];
                $exam->exam_retake_all_count =$exam->getTraineesRetakingExamCount();
                $exam->exam_retake_passed_count =$exam->getRetakePassedCount();
                $exam->exam_retake_failed_count =$exam->getRetakeFailedCount();
                $exam->exam_retake_passed_rate_count =$exam->getRetakePassedRateCount();
                $exam->exam_retake_avg_score_count =$exam->getRetakeAvgScore();
                
            }
          
            return response()->json([
                'status'=>true , 
                'exams'=>$exams , 
                'chartData'=>$chartData
            ]);
            
        }
        return view('instructor.analytics.assessment', [
            'exams'=>$exams,
            'chartData'=>$chartData
        ]) ;
    }
}
