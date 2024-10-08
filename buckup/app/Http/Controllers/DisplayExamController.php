<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class DisplayExamController extends Controller
{

    public function __invoke(Exam $exam , $display)
    {

        $display = intval($display);



        $exam->update([
            'display'=>$display===1 ? 0 : 1
        ]);


        return response()->json([
            'display'=>$display===0 ? 1 :0  ,
            'status'=>true  ,

        ]);
    }
}
