<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class ToggleCertificationController extends Controller
{

    public function __invoke(Certification $certification)
    {

            $certification->update([
                'display'=>! $certification->display
            ]);

            return redirect()->back()->with('success' , 'Done ');
    }
}
