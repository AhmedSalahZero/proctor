<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class FilterCertificationController extends Controller
{

    public function __invoke(Request $request)
    {

        if(Certification::where('certification_id',$request->id)->exists()){
            return redirect()->route('show.certification',[
                'certification'=>trim($request->id)
            ]);
        }

        return redirect()->back()->with('fail','This Certification Does Not Exist ');
    }
}
