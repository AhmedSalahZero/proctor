<?php

namespace App\Policies;

use App\Models\Rule;
use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {

    }

    public function viewAll(User $user , Section $section)
    {
//        dump($user);
//        dd($section);

    }

    public function create(User $user , $section , $permission)
    {

        return $user->rule->sectionsPermissions()->where('section_id',$section->id)->where('permission_id',$permission->id)->exists() ;


    }

}
