<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        return view('backend.courses.view',[
            'courses'=>CourseType::simplePaginate($this->paginationNumber)
        ]);

    }
    public function create()
    {
        return view('backend.courses.crud',array_merge(
            [
                'route'=>route('courses.store') ,

            ] ,
            $this->data(new CourseType())
        ));
    }


    public function store(CourseRequest $request)
    {
        CourseType::create($request->only($this->getCourseData()));

        return redirect()->route('courses.index')->with('success','New Subject Has Been Created Successfully');
    }



    public function edit(CourseType $course)
    {
        return view('backend.courses.crud',array_merge(
            $this->data($course) ,
            [
                'route'=>route('courses.update',$course->id) ,

            ]
        ));
    }


    public function update(CourseRequest $request, CourseType $course)
    {
        $course->update($request->only($this->getCourseData()));

        return redirect()->route('courses.index')->with('success','Subject Has Been Updated');
    }


    public function destroy(CourseType $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success','Subject Has Been Updated Successfully');
    }

    private function getCourseData():array
    {
        return [
            'name',
            'stack',
            'description',
        ];
    }
}
