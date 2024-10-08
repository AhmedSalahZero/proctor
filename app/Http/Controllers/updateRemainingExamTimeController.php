<?php

namespace App\Http\Controllers;

use  App\Models\Exam;
use App\Models\Certification;
use App\Models\Student;
use App\Models\User_exam;
use Illuminate\Http\Request;

class updateRemainingExamTimeController extends Controller
{

	public function __invoke(Request $request)
	{
		$examId = $request->get('exam_id');
		$exam = Exam::find($examId);
		$studentsExams = (array)$request->get('users');
		$remainingTimesWithAnsweredQuestions = [];
		foreach ($studentsExams as $index => $studentIdAndUserExamId) {
			$studentId = $studentIdAndUserExamId['student_id'];
			$userExamId = $studentIdAndUserExamId['user_exam_id'];
			$certification = Certification::where('exam_id', $exam->id)->where('student_id', $studentId)->first();
			$student = Student::find($studentId);
			$isPassedExam = $student->isPassedExam();
			$remainingTimesWithAnsweredQuestions[$studentId] = [
				'remainingTime' => $exam->getRemainingTime($userExamId),
				'answered' => getAnsweredQuestionForUserExam($userExamId),
				'exam_submitted' => $isExamSubmitted = isExamSubmitted(User_Exam::find($userExamId), $exam),
				'score_report_dom' => $isExamSubmitted  ? $this->getScoreReportDom($certification, $studentId) : '-',
				'certifications_dom' => $isExamSubmitted && $isPassedExam ? $this->getCertificationDom($certification) : '-',
			];
		}

		return response()->json([
			'exam_id' => $examId,
			'status' => count($remainingTimesWithAnsweredQuestions),
			'users' => $remainingTimesWithAnsweredQuestions
		]);
	}
	public function getScoreReportDom($certification, $studentId)
	{
		$viewScoreReportRoute = route('view.score.report.by.username', $studentId);
		$certificationDisabledClass = !($certification->display ?? 0) ? 'd-none' : '';
		$certificationNoDisabledClass = $certification->display ?? 0 ? 'd-none' : '';
		$certificationId = $certification->id ?? 0;
		return '
		<a target="__blank" href="' . $viewScoreReportRoute . '" class="text-center sm-btn btn  text-white text-capitalize bg-primary border-primary rounded mr-3 cursor-pointer small-fs">Score Report</a>
		<i data-certification-id="' . $certificationId . '" data-display="0" class="change-certification-display fas fa-lock-open text-secondary fa-lg cursor-pointer ' . $certificationDisabledClass . ' "></i>
		<i data-certification-id="' . $certificationId  . '" data-display="1" class="change-certification-display fas fa-lock text-secondary fa-lg cursor-pointer ' . $certificationNoDisabledClass  . '"></i>
		';
	}
	public function getCertificationDom($certification)
	{
		$downloadCertificationRoute = route('download.single.certification', [$certification->id ?? 0]);
		$downloadBackCertification = route('download.single.back.certification', [$certification->id ?? 0]);
		$disabledLinkClass = !isset($certification->id) ? 'disabled-link' : '';
		return '
		<a href="' . $downloadCertificationRoute . '" class="' . $disabledLinkClass . 'text-center cursor-pointer sm-btn btn-block text-white text-capitalize border-0 disabled bg-success rounded mb-1">download</a>
                                            <div class="flex-centered">
                                                <a href="' .  $disabledLinkClass . '" class="' . $disabledLinkClass . ' sm-btn text-white text-capitalize border-0 bg-success rounded mr-1">
                                                    <i class="fas fa-image text-white fa-lg fs-sm cursor-pointer small-fs"></i>
                                                    <span class="text-capitalize text-white ">front</span>
                                                </a>

                                                <a href="' . $downloadBackCertification . '" class="' . $disabledLinkClass . '    sm-btn text-white text-capitalize border-0 bg-success rounded">
                                                    <i class="fas fa-image text-white fa-lg fs-sm cursor-pointer small-fs"></i>
                                                    <span class="text-capitalize text-white ">Back</span>
                                                </a>

                                            </div>
											
		
		';
	}
}
