<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use Illuminate\Http\Request;

class storeProfileController extends Controller
{
    public function __invoke(StoreProfileRequest $request)
    {
        $request->user('students')->update($request->except(['password','images','_token']));
        if(isset($request->image))
        {
            $image = $request->image->store('users','public');
            $request->user('students')->update([
                'image'=>$image
            ]);
        }
        return redirect()->back()->with('success' , __('Profile Has Been Updated'));
        
    }
}
