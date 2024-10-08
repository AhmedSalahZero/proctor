<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BrowseClassesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
 

        $classes = Exam::where('instructor_id' ,$request->user('students')->ID )
        ->
        when($request->filled('class_title') , function(Builder $builder) use ($request){
            $builder->where(function()use($builder , $request){
                $builder->where('title' , 'like' , '%'. $request->class_title .'%')
                ->orWhere('class_title','like' , '%'. $request->class_title .'%') ; 
            }); 
        })
        ->when($request->filled('from') , function(Builder $builder) use($request){
           $builder->where('start_date' ,  '>=' , $request->get('from')); 
        })
        ->when($request->filled('to') , function(Builder $builder) use($request){
           $builder->where('start_date' ,  '<' , $request->get('to')); 
        })
        ->when($request->filled('exam_date') , function(Builder $builder) use($request){
            $builder->whereDate('start_date' ,'=', $request->get('exam_date') );
        })
         ->when($request->filled('city') , function(Builder $builder) use($request){
             $builder->where('location' ,'like' ,'%'. $request->get('city') .'%');
        })
         ->when($request->filled('country') && $request->get('country') , function(Builder $builder) use($request){
             $builder->where('location' ,'like' ,"%$request->country%");
        })
         ->when($request->filled('course') , function(Builder $builder) use($request){
             $builder->where('course_type' , $request->get('course') );
        })
        ->when($request->filled('instructor') , function(Builder $builder) use ($request){
           
            $builder->where('instructor_id' , $request->get('instructor')) ;
        })
        ->when($request->filled('deployment') , function(Builder $builder) use ($request){
            $builder->where('deployment' , $request->get('deployment')) ;
        })
        
        ->get();
        ;
        
        return view('instructor.browse-classes.index' , [
            'exams'=>$classes
        ]);
    }
}
