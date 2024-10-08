<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Exam;
use Illuminate\Http\Request;

class ProctorChangeCertificationDisplayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $certification  = Certification::where('id',$request->certification_id)->first();
        $certification->update([
            'display'=>$request->display
        ]);
        return response()->json([
            'status'=>true,
            'certification_id'=>$certification->id ,
            'display'=>$request->display 
        ]);
        
    }
}
