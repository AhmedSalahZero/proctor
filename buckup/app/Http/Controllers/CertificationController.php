<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterCertificationRequest;
use App\Http\Requests\StoreCertificationRequest;
use App\Http\Requests\UpdateCertificationRequest;
use App\Models\Certification;
use App\Models\CourseType;
use App\Models\Exam;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        // dd(Student::where('User_Name','MOHAMEDAHMEDALIMOHAMEDHASSAEIN')->first()->PassedExam(true));
        return view('backend.certifications.view_certifications',
        [
           'certifications'=>Certification::with(['user.exams','course'])
           ->paginate($this->paginationNumber),
           'exams'  => Exam::select('id', 'title')->get(),
       ]);
    }

    public function create()
    {
        return view('backend.certifications.crud', [
            'score' => old('score'),
        ])->with(array_merge(
           ['course_types'=>CourseType::all()],
           $this->data(new Certification())
       ));
    }

    public function store(StoreCertificationRequest $request, Certification $certification)
    {

        $certification = Certification::create(
            $request->only($certification->getFillable())
        );

        $certification->setCertificationId();

        $certification->setLink();

        $certification->setValidTo();

        $certification->setStudentID($request->input('student_id'));

        $certification->setScore($request->score);

        $certification->setName();

        $certification->setPassed($request->has('passed'));

        return redirect(route('certifications.index'))->with('success', 'New Certification Has Been Created Successfully');
    }

    public function edit(Certification $certification)
    {

        return view('backend.certifications.crud', [
            'score' => $certification->score(),
            'passed' => $certification->hasPassed(),

        ])->with(array_merge(
            ['course_types'=>CourseType::all()],
            $this->data($certification)
        ))->with('certification',$certification);
    }

    public function update(UpdateCertificationRequest $request, Certification $certification)
    {


        $certification->update(
            $request->only($certification->getFillable())
        );

        $certification->setValidTo();

        $certification->setStudentID($request->input('student_id'));

        $certification->setScore($request->score);

        $certification->setPassed($request->has('passed'));

        $certification->setName();

        return redirect(route('certifications.index'))->with('success', 'Certification Has Been Update Successfully');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();

        return redirect(route('certifications.index'))->with('success', 'Certification Has Been Deleted Successfully');
    }

    public function search(FilterCertificationRequest $request): View
    {
        $from_range = null ;
        if($request->from)
        {
            $from_range = $request->input('from');
            $from_range = Carbon::make($from_range)->format('Y/m/d H:m:i');

        }

        $to_range = now()->toDateTimeString();

        if($request->input('to')) {

            $to_range = $request->input('to');
            $to_range = Carbon::make($to_range)->format('Y/m/d H:m:i');

        }

        $certification = Certification::
        when($request->exam_id , function($q) use ($request){

            $q->where('exam_id', $request->exam_id);

        })
            ->when($request->course_type,function($q) use ($request){
                $q->whereHas('course',function($q){
                   $q->where('id',Request('course_type')) ;
                });
            })
            ->when($request->from , function($q) use ($request , $from_range , $to_range){
//                $q->has('exam');
                $q->whereHas('exam',function($qu) use ($from_range , $to_range){
                        $qu->whereBetween('start_date'  , [$from_range , $to_range]);
                });
            })
            ->paginate('20');

        return view('backend.certifications.view_certifications',
        [
           'certifications' =>  $certification,
           'exams'          =>  Exam::select('id', 'title')->get(),
           'exam_id'        =>  $request->exam_id,
       ]);
    }
}
