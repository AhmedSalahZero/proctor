<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Rule;
use App\Models\Section;
use App\Policies\AccessSection;
use App\Policies\PermissionPolicy;
use App\Policies\SectionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        Rule::class => AccessSection::class,

        Section::class=>SectionPolicy::class,

//        Permission::class=>PermissionPolicy::class
    ];

    public function boot()
    {

        $this->registerPolicies();


        Gate::define('access',function($user,$permissionSlug,$sectionSlug)
        {

            // Use This Until Pass Section and Permission Object Not Slugs , As Defined In Commented Gate


            $section = Section::where('slug',$sectionSlug)->first();

            $permission = Permission::where('slug',$permissionSlug)->first();

            return $user->rule->sectionsPermissions()->where('section_id',$section->id)
                                                     ->where('permission_id',$permission->id)->exists();

        });

        Gate::define('ReadOrCreate',function($user,$sectionSlug)
        {

            // Use This Until Pass Section and Permission Object Not Slugs , As Defined In Commented Gate

            $section = Section::where('slug',$sectionSlug)->first();

            $readPermission = Permission::where('slug','read')->first();

            $createPermission = Permission::where('slug','create')->first();


            return $user->rule->sectionsPermissions()->where('section_id',$section->id)
                ->whereIn('permission_id',[$readPermission->id , $createPermission->id])->exists();

        });

        Gate::define('viewSectionHeader',function($user,...$sectionsSlugs)
        {

            // Use This Until Pass Section and Permission Object Not Slugs , As Defined In Commented Gate
            for ( $i = 0 ; $i < count($sectionsSlugs) ; $i++ )
            {
                if($user->can('ReadOrCreate',$sectionsSlugs[$i]))

                    return true ;

            }
            return false ;
        });




//        Gate::define('access',function($user,$permission,$section)
//        {
//            return $user->rule->sectionsPermissions()->where('section_id',$section->id)
//                ->where('permission_id',$permission->id)->exists() ;
//        });

    }
}
