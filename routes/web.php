<?php

namespace App;

use App\Http\Controllers\AbsenceStudentController;
use App\Http\Controllers\AnalysisClassesController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssignUserToExam;
use App\Http\Controllers\BrowseClassesController;
use App\Http\Controllers\CertificateLookupController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\changePasswordController;
use App\Http\Controllers\CheckProctorPassword;
use App\Http\Controllers\CloseExam;
use App\Http\Controllers\ConfirmInfoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetachUserFromExam;
use App\Http\Controllers\DisplayExamController;
use App\Http\Controllers\DownloadInstructorCertification;
use App\Http\Controllers\DownloadScoreReportByUserName;
use App\Http\Controllers\DownloadSingleBackCertification;
use App\Http\Controllers\DownloadSingleCertification;
use App\Http\Controllers\DownloadSingleFrontCertification;
use App\Http\Controllers\DownloadSingleReport;
use App\Http\Controllers\DownloadSingleRoster;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\FilterAssessmentController;
use App\Http\Controllers\FilterCertificationController;
use App\Http\Controllers\FilterScores;
use App\Http\Controllers\FilterStudentsController;
use App\Http\Controllers\FinishExamTimeController;
use App\Http\Controllers\FrontLoginController;
use App\Http\Controllers\FrontLogoutController;
use App\Http\Controllers\getUsersExams;
use App\Http\Controllers\HasNoteController;
use App\Http\Controllers\HasScoreAll;
use App\Http\Controllers\HasScoreController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\Instructor\ClassesController;
use App\Http\Controllers\Instructor\HomeController;
use App\Http\Controllers\InstructorLoginController;
use App\Http\Controllers\LicenseAgreementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\Mails\ExamMail;
use App\Http\Controllers\ProctorChangeCertificationDisplayController;
use App\Http\Controllers\ProctorCloseExamController;
use App\Http\Controllers\ProctorController;
use App\Http\Controllers\ProctorFilterCalendarController;
use App\Http\Controllers\ProctorStartExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SaveAnswersController;
use App\Http\Controllers\SaveSkillScoreController;
use App\Http\Controllers\SearchExamController;
use App\Http\Controllers\SearchExamStudents;
use App\Http\Controllers\SearchQuestionController;
use App\Http\Controllers\SearchStudentController;
use App\Http\Controllers\SendSingleCertification;
use App\Http\Controllers\SendSingleReport;
use App\Http\Controllers\SetNoteController;
use App\Http\Controllers\SetScoreAll;
use App\Http\Controllers\SetScoreController;
use App\Http\Controllers\ShowCertificationController;
use App\Http\Controllers\ShowMyExamQuestions;
use App\Http\Controllers\showProfileController;
use App\Http\Controllers\SignoutInstructorController;
use App\Http\Controllers\storeProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExamMail;
use App\Http\Controllers\SubmitInstructorLoginController;
use App\Http\Controllers\SubmitLoginController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ToggleCertificationController;
use App\Http\Controllers\ToggleCertificationDisplayController;
use App\Http\Controllers\ToggleStudentAbsence;
use App\Http\Controllers\ToggleStudentCertification;
use App\Http\Controllers\UpdateGoogleMapController;
use App\Http\Controllers\updateRemainingExamTimeController;
use App\Http\Controllers\UpdateSingleScore;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewCurrentExams;
use App\Http\Controllers\ViewInstructorLogs;
use App\Http\Controllers\ViewScoreReportByUserName;
use App\Http\Controllers\ViewSingleCertification;
use App\Http\Controllers\ViewSingleReport;
use App\Http\Controllers\ViewStudentsScores;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*==================================================================================================================================*/
/*========================================================= Frontend Routes =========================================================*/
/*==================================================================================================================================*/


Route::get('/iadc_certification', function () {
	return view('frontend.certification');
});
Route::redirect('/', '/login')->name('main.certifications');

Route::get('iadc_certification/{certification:certification_id}', [ShowCertificationController::class, '__invoke'])->name('show.certification');

Route::get('filter-certifications}', [FilterCertificationController::class, '__invoke'])->name('search.certification');
Route::get('logout', [FrontLogoutController::class, '__invoke'])->name('front.logout');

// Auth
Route::middleware('guest')->group(function () {
	Route::get('admin/login', [LoginController::class, 'index'])->name('login.index');
	Route::post('admin/login', [LoginController::class, 'login']);
});




Route::get('login', [FrontLoginController::class, '__invoke'])->name('front.login.user');
Route::post('login', [SubmitLoginController::class, '__invoke'])->name('front.login');

//Route::middleware('guest:students')->group(function(){
//
//
//});
//
// Must Be Student
Route::middleware('auth:students')->group(function () {
	Route::post('save_answer', [SaveAnswersController::class, '__invoke'])->name('save.answers');
	Route::get('exam', [ShowMyExamQuestions::class, '__invoke'])->name('start.exam');
	Route::get('confirm-info', [ConfirmInfoController::class, '__invoke'])->name('confirm.info');
	Route::get('Instructions', [InstructionsController::class, '__invoke'])->name('show.students.instruction');
	Route::get('license-agreement', [LicenseAgreementController::class, '__invoke'])->name('students.license-agreement');
	Route::get('survey', [SurveyController::class, '__invoke'])->name('survey');
	Route::get('result', [ExamResultController::class, '__invoke'])->name('exam.result');
	Route::post('finish_exam/{user_exam}', [FinishExamTimeController::class, '__invoke'])->name('finish.exam');
	Route::get('update.google.map', [UpdateGoogleMapController::class, '__invoke'])->name('update.google.map');
});


/*==================================================================================================================================*/
/*========================================================= Backend Routes =========================================================*/
/*==================================================================================================================================*/
Route::get('view-score-report/{id}', [ViewScoreReportByUserName::class, 'index'])->withoutMiddleware('isAdmin')->name('view.score.report.by.username');
//Route::get('view-wrong-answers/{id}',[ViewScoreReportByUserName::class,'wrong_answers'])->withoutMiddleware('isAdmin')->name('view.wrong.answers');

// Route::get('download-score-report/{user}', [DownloadScoreReportByUserName::class, '__invoke'])->withoutMiddleware('isAdmin')->name('download.single.score.report');

Route::middleware('isAdmin')->prefix('admin')->group(function () {

	// Dashboard
	Route::get('/', [DashboardController::class, '__invoke'])->name('dashboard');

	// Certifications

	Route::resource('certifications', CertificationController::class)->except(['show']);
	Route::get('certifications/search', [CertificationController::class, 'search'])->name('certifications.search');
	Route::get('certification/{certification}/change-display', [ToggleCertificationDisplayController::class, '__invoke'])->name('certifications.change.display');
	Route::get('view-report/{certification}', [ViewSingleReport::class, '__invoke'])->name('view.single.report');
	Route::get('download-report/{certification}', [DownloadSingleReport::class, '__invoke'])->name('download.single.report');
	Route::get('send-report/{certification}', [SendSingleReport::class, '__invoke'])->name('send.single.report');
	Route::get('view-certification/{certification}', [ViewSingleCertification::class, '__invoke'])->name('view.single.certification')->withoutMiddleware(['isAdmin']);
	Route::get('download-roster/{exam}', [DownloadSingleRoster::class, '__invoke'])->name('download.roster')->withoutMiddleware(['isAdmin']);
	Route::get('download-certification/{certification}', [DownloadSingleCertification::class, '__invoke'])->name('download.single.certification')->withoutMiddleware(['isAdmin']);
	Route::get('download-instructor-certification', [DownloadInstructorCertification::class, '__invoke'])->name('download.instructor.certification')->withoutMiddleware(['isAdmin']);
	Route::get('download-front-certification/{certification}', [DownloadSingleFrontCertification::class, '__invoke'])->name('download.single.front.certification')->withoutMiddleware(['isAdmin']);
	Route::get('download-back-certification/{certification}', [DownloadSingleBackCertification::class, '__invoke'])->name('download.single.back.certification')->withoutMiddleware(['isAdmin']);
	Route::get('send-certification/{certification}', [SendSingleCertification::class, '__invoke'])->name('send.single.certification')->withoutMiddleware(['isAdmin']);

	// Exam
	Route::resource('exams', ExamController::class)->except(['show']);
	Route::post('exam/{exam}/', [ExamMail::class, '__invoke'])->name('exams.mail');
	Route::get('search/', [SearchExamController::class, '__invoke'])->name('search.exams');


	//questions
	Route::get('search-questions', [SearchQuestionController::class, '__invoke'])->name('search.questions');

	// Users
	Route::resource('users', UsersController::class)->except(['show']);
	Route::resource('students', StudentController::class)->except(['show']);
	Route::get('proctors', [ProctorController::class, 'index'])->name('proctors.index');
	Route::post('student/{student}/', [StudentExamMail::class, '__invoke'])->name('user.exam.mail');
	Route::get('student/toggle/{student}/{certification}/{status}', [ToggleStudentCertification::class, '__invoke'])->name('student.toggle.certification');
	Route::post('toggle-certification/{certification}', [ToggleCertificationController::class, '__invoke'])->name('toggle.certification');
	Route::get('student/toggle-exam/{student}/{exam}', [ToggleStudentAbsence::class, '__invoke'])->name('student.toggle.absence');
	Route::post('student/assign-exam/{student}', [AssignUserToExam::class, '__invoke'])->name('user.assign.exam');
	Route::get('student/detach/{student}/{exam}', [DetachUserFromExam::class, '__invoke'])->name('exam.detach.user');
	Route::get('search-students/', [SearchStudentController::class, '__invoke'])->name('search.students');
	Route::get('search-exam/students', [SearchExamStudents::class, '__invoke'])->name('search.exams.certifications');
	Route::post('filter-students', [FilterStudentsController::class, '__invoke'])->name('filter.students');
	Route::post('absence-students/{student}/{exam}/{status}', [AbsenceStudentController::class, '__invoke']);
	Route::post('display-exam/{exam}/{status}', [DisplayExamController::class, '__invoke']);
	Route::post('set-score/{student}/{exam}', [SetScoreController::class, '__invoke']);
	Route::post('set-note/{student}/{exam}', [SetNoteController::class, '__invoke']);
	Route::post('update-score/', [UpdateSingleScore::class, '__invoke'])->name('update.score');
	Route::post('close-exam/{exam}', [CloseExam::class, '__invoke'])->name('exams.close');
	Route::get('current-exams/', [ViewCurrentExams::class, '__invoke'])->name('current.exams');
	Route::get('instructor-logs/', [ViewInstructorLogs::class, '__invoke'])->name('instructor.logs');
	Route::post('has-note/{student}/{exam}', [HasNoteController::class, '__invoke']);

	// Route::post('set-score-all/{student}/{exam}', [SetScoreAll::class, '__invoke']);
	Route::post('has-score/{student}/{exam}', [HasScoreController::class, '__invoke']);
	//  Route::post('has-score-all/{student}/{exam}', [HasScoreAll::class, '__invoke']);

	// Students Scores


	Route::get('students-score', [ViewStudentsScores::class, '__invoke'])->name('students-scores');
	Route::get('students-score/search', [FilterScores::class, '__invoke'])->name('score.search');

	// Questions
	Route::resource('questions', QuestionController::class);
	Route::resource('exams.questions', ExamQuestionController::class)->except(['show', 'store', 'index', 'destroy']);

	// Courses
	Route::resource('courses', CourseController::class)->except(['show']);

	// Logout
	Route::get('logout', [LogOutController::class, '__invoke'])->name('admin.logout');




	Route::post('save-skill-score', [SaveSkillScoreController::class, '__invoke'])->name('save.skill.report')->withoutMiddleware(['isAdmin']);
});

Route::get('get/users/exams', [getUsersExams::class, '__invoke'])->name('get.users.exams');
Route::post('settings/card/domains',  function (Request $request) {
	Setting::where('type', 3)->update(['Msg' => $request->card_domain]);
	return redirect()->back()->with('success', 'Card Domain Has Been Updated Successfully');
})->name('settings.card.domain');


Route::post('settings/certification/domains',  function (Request $request) {
	Setting::where('type', 4)->update(['Msg' => $request->certification_domain]);
	return redirect()->back()->with('success', 'Certification Domain Has Been Updated Successfully');
})->name('settings.certification.domain');

Route::post('/pages/uploadImage', function (Request $request) {
	if ($request->has('upload')) {
		$url = $request->file('upload')->store('images', 'public');
	}
	$url = 'storage/' . $url;
	$CKEditorFuncNum = $request->CKEditorFuncNum;
	\App\Models\Image::create(['url' => $url]);
	$message = '';
	$url = asset($url);
	// return response()->json([ 'fileName' => 'your file name put here', 'uploaded' => false, 'url' => $url ]);
	// $res =  "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$message'); </script> ";
	return response()->json(['url' => $url, 'uploaded' => 1,  "fileName" => "15292215661489102869.png"]);
})->name('upload.image');

Route::get('/logouts', function () {
	Auth('students')->logout();

	return redirect()->route('front.login.user');

	return redirect()->route('main.certifications');
})->name('users.logout');

Route::prefix('instructor')->group(function () {


	// Route::get('login', [InstructorLoginController::class, '__invoke'])->name('instructor.login.user');
	// Route::post('login', [SubmitInstructorLoginController::class, '__invoke'])->name('instructor.login');

	// Route::get('instructor/logout' ,[SignoutInstructorController::class , '__invoke'] )->name('instructor.sign-out');

	Route::middleware('isInstructor')->group(function () {


		Route::get('home', [HomeController::class, '__invoke'])->name('instructor.home.index');
		Route::post('check-proctor-password', [CheckProctorPassword::class, '__invoke'])->name('check.proctor.password');
		Route::post('proctors.can.start.exam', [ProctorStartExamController::class, '__invoke'])->name('proctors.can.start.exam');
		Route::post('proctors.can.end.exam', [ProctorCloseExamController::class, '__invoke'])->name('proctor.stop.exam');
		Route::post('proctors.can.change.certification-display', [ProctorChangeCertificationDisplayController::class, '__invoke'])->name('proctor.change.certification.display');
		Route::post('proctors.filter-calendar', [ProctorFilterCalendarController::class, '__invoke'])->name('proctor.filters.calendar');
		Route::get('browse-classes', [BrowseClassesController::class, '__invoke'])->name('instructor.browse.classes.index');
		Route::get('certificate-lookup', [CertificateLookupController::class, '__invoke'])->name('instructor.certificate.lookup');
		Route::get('classes', [ClassesController::class, '__invoke'])->name('instructor.classes.index');


		Route::get('my-profile', [showProfileController::class, '__invoke'])->name('instructor.profile.index');
		Route::post('my-profile', [storeProfileController::class, '__invoke'])->name('store.instuctor.profile');
		Route::post('change-password', [changePasswordController::class, '__invoke'])->name('instructor.change.password');
		Route::get('analytics/assessments', [AssessmentController::class, '__invoke'])->name('instructor.analytics.assessment.index');
		Route::get('analytics/classes', [AnalysisClassesController::class, '__invoke'])->name('instructor.analytics.classes.index');



		Route::get('helpers/updateMapBasedOnLatitudeAndLongitude', function () {
			$project = optional();
			return response()->json([
				'status' => true,
				'message' => 'message',
				'project' => $project->toArray(),
			]);
		})->name('filterProjectsBasedOnLatitudeAndLongitude');
		Route::get('filter', function (Request $request) {
			$locations = [];

			$projectsLocations = [
				'31.233334' => '30.033333'
			];
			// $projectsLocations = Project::filter($request->all())->pluck('longitude', 'latitude')->toArray();

			foreach ($projectsLocations as $long => $lat) {
				$locations[] = ['1', $long, $lat, 3];
			}

			return response()->json($locations);
		})->name('ajax.projects.filter');
	});
});
Route::post('/update-remain-time', [updateRemainingExamTimeController::class, '__invoke']);
