<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ProctorStartExamController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{

		$exam  = Exam::where('id', $request->exam_id)->first();
		$exam->update([
			'display' => 1,
			'started_on' => $started_on = now()
		]);

		return response()->json([
			'status' => true,
			'exam_id' => $exam->id,
			'started_on' => $exam->getStartedOn()
		]);
	}
}
