<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\User_exam;
use Illuminate\Http\Request;

class UpdateSingleScore extends Controller
{

    public function __invoke(Request $request)
    {

        switch ($request->input('type'))
        {
            case 'without_exam';

            $certification = Certification::where('id',$request->certification_id)->update([
                'score'=>$request->score,
                'passed'=>$request->has('passed')
            ]);

            break ;

            case 'has_exam';

            User_exam::where('exam_id',$request->exam_id)->where('User_ID',$request->student_id)->first()->update([
                'score'=>$request->score
            ]);
        }

        return redirect()->back()->with('success','Score Has Been Update');

    }
}
