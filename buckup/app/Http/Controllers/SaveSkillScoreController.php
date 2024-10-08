<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillScoreRequest;
use App\Models\Certification;
use Illuminate\Http\Request;

class SaveSkillScoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SkillScoreRequest $request)
    {
       foreach($request->skill_scores as $student_id=>$score)
       {
           $certification = Certification::where('id',$request->certification_id[$student_id])->first();

           if($certification)
           {
               $certification->update([
                   'skill_score'=>$score
               ]);
           }
               
       }

       return redirect()->back()->with('success' , 'Skill Score Has Been Updated Successfully');
       

    }
}
