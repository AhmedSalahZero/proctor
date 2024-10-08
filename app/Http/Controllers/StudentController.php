<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\InstructorCertification;
use App\Models\Question;
use App\Models\Student;
use App\Models\User;
use App\Models\UserAnswer;
use Request;

class StudentController extends Controller
{
	public function index()
	{
		return view('backend.students.view', [
			'students' => Student::with('exams', 'certifications.course')->paginate($this->paginationNumber),
		]);
	}

	public function create()
	{
		return view('backend.students.crud', array_merge([
			'route' => route('students.store'),
			'student' => optional()
		]), $this->data(new Student()));
	}

	public function store(StudentRequest $request, Student $student)
	{



		$userName = Request()->filled('User_Name') ? Request('User_Name') :  str_replace(' ', '', $request->get('Full_Name'));
		$image = '';
		if (Student::where('User_Name', $userName)->exists())
			return redirect()->back()->with('fail', 'This Name Already Exist');
		if (isset($request->image)) {
			$image = $request->image->store('users', 'public');
		}

		$student = Student::create(
			array_merge($request->only($student->getFillable()), [
				'Password' => User::generateRandomPassword(6),
				'ExamType' => $request->input('course_type'),
				'exam_time' => 210,
				'User_Name' => $userName,
				'image' => $image
			])

		);

		if ($student->isInstructor()) {
			$certificationForInstructor = InstructorCertification::create($request->only($this->getInstructorCertificationData()));
			$student->instructor_certification_id = $certificationForInstructor->id;
			$certificationForInstructor->assignCourses((array)$request->courses);
			$student->save();
		}


		return redirect()->route('students.index')->with('success', 'New User Has Been Created Successfully');
	}

	public function edit(Student $student)
	{
		return view('backend.students.crud', array_merge($this->data($student), [
			'route' => route('students.update', $student->ID),
			'student' => $student,
			'certification' => $student->isInstructor() ? $student->instructorCertification : null
		]));
	}

public function update(UpdateStudentRequest $request, Student $student)
	{

		if (isset($request->image)) {
			$image = $request->image->store('users', 'public');
		} else {
			$image = $student->image;
		}

		$student->update(array_merge($request->only($this->getStudentData()), [
			'Password' => Request('Password') ? ($request->input('Password')) : $student->Password,
			'ExamType' => $request->input('course_type'),
			'image' => $image,
			// 'instructor_certification_id'=> $student->isInstructor() ? $request->
		]));
		if ($student->isInstructor() && $student->instructorCertification) {

			$student->instructorCertification->update(
				$request->only($this->getInstructorCertificationData())
			);
			$student->instructorCertification->courses()->detach();
			foreach ($request->courses as $courseId) {
				$student->instructorCertification->courses()->attach($courseId);
			}
		} elseif ($student->isInstructor()) {
			$certificationForInstructor = InstructorCertification::create($request->only($this->getInstructorCertificationData()));
			$student->instructor_certification_id = $certificationForInstructor->id;
			$certificationForInstructor->assignCourses($request->courses);
			$student->save();
		} else {
			if ($student->instructorCertification) {
				$student->instructor_certification_id = null;
				$student->instructorCertification->courses()->detach();
				$student->instructorCertification->delete();
			}
		}

		return redirect()->back()->with('success', 'User Has Been Updated successfully');
	}

	public function destroy(Student $student)
	{
		$student->delete();

		return redirect()->route('students.index')->with('success', 'Student Deleted Successfully');
	}

	private function getStudentData(): array
	{
		return [
			'User_Name', 'Email', 'Full_Name', 'alt_email', 'Phone', 'Type_ID', 'questions_num', 'month_of_birth', 'day_of_birth', 'country', 'city', 'postal_code', 'position', 'employee_id','last_name'
		];
	}
	public function getInstructorCertificationData(): array
	{
		return [
			'description', 'stack', 'supplement', 'instructor_number', 'issued_by', 'certificate_date', 'expiration_date', 'issued_by_position'
		];
	}
}
