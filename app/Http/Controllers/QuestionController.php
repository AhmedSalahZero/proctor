<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        return view('backend.questions.view', [
            'questions'=>Question::whereHas('answers')->with('answers')->paginate($this->paginationNumber),
        ]);
    }

    public function create()
    {
        return view('backend.questions.crud',
        ['course_types'   => CourseType::select('id', 'name')->get(),
        'route' =>route('questions.store'),
        'course_type_id'    => old('exam_id'),
        ], $this->data(new Question()));
    }

    public function store(request $request, Exam $exam)
    {
        $exam->addQuestions($request);

        return redirect()->route('questions.index')->with('success', 'Questions Has Been Created Successfully');
    }

    public function show(Question $question)
    {
        return view('backend.questions.view')
            ->with('questions', Question::with('answers')->get());
    }

    public function edit(Question $question)
    {
    }

    public function update(Question $question, request $request)
    {
        $question->update([
           'Question'=> $request['questions'][$question->ID],
            'Degree'=>$request['degree'][$question->ID],
        ]);

        $question->answers()->delete();

        $question->answers()->createMany($question->getAnswersRecords($request['answers'][$question->ID], $question->ID, $request['correct'][$question->ID]));

        return redirect()->route('questions.index')->with('success', 'Question Has Been Updated Successfully');
    }

    public function destroy(Question $question)
    {
        $question->answers()->delete();

        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question With Its Answers Have Been Deleted Successfully ');
    }
}
