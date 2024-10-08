<?php

namespace App\Http\Controllers;

use App\Models\User_exam;
use Illuminate\Http\Request;

class FinishExamTimeController extends Controller
{

    public function __invoke(User_exam $user_exam)
    {

        $user_exam->update([
            'Finished_At'=>now()
        ]);

        return response()->json([
            'status'=>true
        ]);


    }
}
