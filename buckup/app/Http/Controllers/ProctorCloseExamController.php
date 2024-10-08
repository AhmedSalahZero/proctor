<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ProctorCloseExamController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $exam  = Exam::where('id',$request->exam_id)->first();
        $exam->update([
            'display'=>0
        ]);
        return response()->json([
            'status'=>true,
            'exam_id'=>$exam->id 
        ]);
        
    }
}
