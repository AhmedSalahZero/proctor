<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;
use App\Models\Rule;
use App\Models\Section;
use App\Models\SectionPermission;
use Illuminate\Http\Request;

class UpdateSectionsPermissions extends Controller
{
    use Authorize ;


    public function update(Request $request,Rule $rule)
    {
        $rule->sectionsPermissions()->detach();

        foreach ((array)$request->data as $sectionId=>$data)
        {

            $permissions = array_keys($data);

            $sectionPermissions = SectionPermission::where('section_id',$sectionId)->whereIn('permission_id',$permissions)->get();

            $rule->sectionsPermissions()->attach($sectionPermissions->pluck('id'));

        }

        return redirect(route('sections.permission'))->with('success',trans('lang.Changes Has Been Saved Successfully'));

    }



}
