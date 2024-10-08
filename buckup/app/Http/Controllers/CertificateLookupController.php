<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CertificateLookupController extends Controller
{
 
    public function __invoke(Request $request)
    {
        $certifications = Certification::whereHas('exam',function(Builder $builder) use ($request){
            $builder->where('instructor_id' ,$request->user('students')->ID );
        })->when($request->filled('first') || $request->filled('last') , function(Builder $builder) use ($request){
            $builder->where(function()use($builder , $request){
                $builder->where('name' , 'like' , '%'. $request->first .'%')
                ->orWhere('name','like' , '%'. $request->last .'%') ; 
            }); 
        })
        ->when($request->filled('email') , function(Builder $builder) use($request){
             $builder->whereHas('user',function($builder) use ($request){
                 $builder->where('Email',$request->get('email'));
             });
        })
        ->when($request->filled('certification_id') , function(Builder $builder) use($request){
             $builder->where('certification_id' ,  $request->get('certification_id'));
        })
        ->when($request->filled('class_id') , function(Builder $builder) use($request){
                $builder->whereHas('exam' , function(Builder $builder) use($request){
                    $builder->where('class_id' ,  $request->get('class_id'));
                 });
        })
        ->when($request->filled('provider') , function(Builder $builder) use($request){
             $builder->where('provider' ,  $request->get('provider'));
        })
        ->when($request->filled('supplement') , function(Builder $builder) use($request){
             $builder->where('supplement' ,  $request->get('supplement'));
        })
        ->when($request->filled('instructor') , function(Builder $builder) use($request){
             $builder->where('instructor_name' , 'like', '%'. $request->get('instructor') . '%') ;
        })
        ->when($request->filled('course_level') , function(Builder $builder) use($request){
             $builder->where('course_type' ,  $request->course_level) ;
        })
        ->when($request->filled('from') , function(Builder $builder) use($request){
           $builder->where('completed_date' ,  '>=' , $request->get('from')); 
        })
        ->when($request->filled('to') , function(Builder $builder) use($request){
           $builder->where('completed_date' ,  '<' , $request->get('to')); 
        })
        ->get();
        ;
        
        return view('instructor.certificate-lookup.index' , [
            'certifications'=>$certifications
        ]);
    }
}
