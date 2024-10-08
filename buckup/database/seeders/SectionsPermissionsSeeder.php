<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\SectionPermission;
use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Section::all() as $section)
        {
            foreach (Permission::all() as $permission)
            {
                SectionPermission::factory()->create([
                    'permission_id'=>$permission->id ,
                    'section_id'=>$section->id ,
                ]);
            }

        }


    }
}
