<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorize;
use App\Models\Permission;
use App\Models\Rule;
use App\Models\Section;
use Illuminate\Http\Request;

class ShowSectionsPermissions extends Controller
{
    use Authorize ;


    public function index(Request $request)
    {

        return view('backend.rules_permissions.rules_permissions')
            ->with('rules',Rule::all())
            ->with('permissions',Permission::all())
            ->with('sections',Section::all());
    }


}
