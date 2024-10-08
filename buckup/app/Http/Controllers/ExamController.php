<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Http\Requests\UpdateExam;
use App\Models\Certification;
use App\Models\CourseType;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;

class ExamController extends Controller
{
    public function index()
    {

        return view('backend.exams.view', [
            'exams'=>Exam::with(['students.certifications'])->paginate($this->paginationNumber),
        ]);
    }

    public function create()
    {
        return view('backend.exams.crud', array_merge(
            $this->data(new Exam()), [
                'course_types'  =>  CourseType::all(),
                'route'         =>  route('exams.store'),
                'types'         =>  Exam::types(),
            ]
        ));


    }

    public function store(ExamRequest $request, Exam $exam, Student $student , Question $question)
    {
        $students = $request->input('students');

        $exam = $exam->make($request->only($this->getExamData()));
        $exam->class_id = \generateUniqueClassId(6) ;
        $assignedQuestions = $exam->assignQuestions($request->input('course_type') ,
            $request->input('no_questions') ,$students);

        if($assignedQuestions['status'])
        {

            $certification = $request->only($this->getCertificationData());
            $certification['instructor_name'] = $exam->instructor->Full_Name ?? '';  
            $student->assignCertification($certification, $students, $exam);

            return redirect()->route('exams.index')->with('success', 'Exam Created Successfully');
        }

        return redirect()->back()->with('fail','No Enough Question For This Course ..'. $assignedQuestions['no_questions_available'] . ' Available ');


    }

    public function edit(Exam $exam)
    {
        return view('backend.exams.crud', [
            'route'=>route('exams.update', $exam->id),
            'exam'  =>$exam,
            'course_types' => CourseType::all(),
            'types'         =>  Exam::types(),
        ],
        $this->data($exam)
        )->with('certification',$exam->certifications->first());
    }

    //UpdateExam

    public function update(ExamRequest $request, Exam $exam, Student $student , Question $question)
    {
        $oldStudentsIds = Certification::where('exam_id',$exam->id)->pluck('student_id');
        
        if(($exam->certifications->first()->course_type != $request->input('course_type')) ||
            $exam->no_questions != $request->input('no_questions'))
        {
            $exam->userAnswers()->delete();

            $exam->assignQuestions($request->input('course_type') ,$request->input('no_questions'),$oldStudentsIds->toArray());

        }
        //dd('no need');
        $exam->update($request->only($this->getExamData()));

        $certification = $request->only($this->getCertificationData());


        $newStudents = collect(request('students')) ;

        $addStudentsID = $newStudents->diff($oldStudentsIds)->toArray() ; // 3

        $removeStudentsIds = $oldStudentsIds->diff($newStudents)->toArray() ; // 18

        $commonStudents = $oldStudentsIds->intersect($newStudents)->toArray();

        if(count($commonStudents))
        {

             Certification::where('exam_id',$exam->id)->whereIn('student_id',$commonStudents)->update(
                 $request->only($this->getCertificationData())
             );
        }

        if(count($removeStudentsIds)) {

            $exam->deleteCertificationsFor($removeStudentsIds);

            $exam->detachStudentsFor($removeStudentsIds);
        }

        if(count($addStudentsID))
        {
            $exam->assignStudents($addStudentsID);

            $student->assignCertification($certification, $addStudentsID, $exam);
        }



        return redirect()->route('exams.index')->with('success', 'Exam Update Successfully');
//
//        $exam->deleteCertifications();
//
//        $exam->detachStudents();
//
//        $exam->update($request->only($this->getExamData()));
//
//        $exam->assignStudents($request->input('students'));
//
//        $certification = $request->only($this->getCertificationData());
//
//        $student->assignCertification($certification, $request->input('students'), $exam);
//
//        return redirect()->route('exams.index')->with('success', 'Exam Update Successfully');
    }

    public function destroy(Exam $exam)
    {
        $exam->deleteCertifications();

        $exam->detachStudents();

        $exam->delete();

        return redirect()->route('exams.index')->with('success', 'Exam Delete Successfully');
    }

    private function getExamData():array
    {
        return [
            'pass_percentage', 'title', 'zoom_link', 'no_questions', 'duration', 'start_date', 'display', 'type','proctor'
            ,'location','stack','domain','instructor_id','country_id','address'  ,'class_title','course_type',
            'course_start_date',
            'course_end_date',
        ];
    }

    private function getCertificationData():array
    {
        return [
           'course_type', 'completed_date', 'supplement', 'provider', 'telephone_number', 'provider_number',
            'instructor_name', 'exam_id','skill_score','course_date'
        ];
    }
}
