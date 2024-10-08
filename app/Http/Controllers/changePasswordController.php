<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use Illuminate\Http\Request;

class changePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $password = $request->password; 
        $request->user('students')->update([
            'Password'=>$password 
        ]);
        return ;
        // return redirect()->back()->with('success' , __('Profile Has Been Updated'));
        
    }
}
