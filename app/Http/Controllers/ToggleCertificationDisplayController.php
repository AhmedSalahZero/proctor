<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class ToggleCertificationDisplayController extends Controller
{

    public function __invoke(Certification $certification)
    {

        $certification->update([
            'display'=>! (bool)$certification->display
        ]);

        return redirect()->route('exams.index')->with('success','Done ! ');

    }
}
