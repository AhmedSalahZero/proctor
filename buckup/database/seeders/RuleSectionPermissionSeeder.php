<?php

namespace Database\Seeders;

use App\Models\SectionPermission;
use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSectionPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Rule::all() as $rule)
        {
            foreach (SectionPermission::all() as $sectionPermission)
            {

                if(!($rule->name['en'] ==='editor' && $sectionPermission->section->name['en']=='settings')
                    && !($rule->name['en']=='moderator' && $sectionPermission->permission->name['en']=='Edit')
                    && !($rule->name['en']=='moderator' && $sectionPermission->permission->name['en']=='delete')
//                    && $rule->name['en'] != 'user'
//                    && $rule->name['en'] != 'account'

                )

                    $rule->sectionsPermissions()->attach($sectionPermission->id);
               //     dd($permissionSection->section);
            }

        }
     //   dd($rules->sectionsPermissions->contains('section_id',1)&&$rules->sectionsPermissions->contains('permission_id',1));
//        dd($rules->permissionSections->map->sections->flatten()->pluck('id'));

    }
}
