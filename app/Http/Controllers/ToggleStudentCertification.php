<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Student;
use Illuminate\Http\Request;

class ToggleStudentCertification extends Controller
{

    public function __invoke(Student $student , Certification $certification , $currentStatus)
    {
        $certification->update([
            'display'=>! $currentStatus
        ]);

        return redirect()->back()->with('success','Done !');


    }
}
