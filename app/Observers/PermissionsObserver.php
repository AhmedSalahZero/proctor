<?php

namespace App\Observers;

use App\Models\Permission;
use App\Models\RuleSectionPermission;

class PermissionsObserver
{
    public function deleting(Permission $permission):void
    {

        $permission->sections()->each(function($section)
        {
            $section_permission_id = $section->pivot->id ;

            RuleSectionPermission::where('section_permission_id',$section_permission_id)->delete();
        });

        $permission->sections()->detach();

    }
}
