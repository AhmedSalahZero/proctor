<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::factory()->create([
            'name'=>[
                'en'=>'Categories',
                'ar'=>'الاصناف'
            ],
            'slug'=>'Categories'

        ]);

        Section::factory()->create([
            'name'=>[
                'en'=>'Products',
                'ar'=>'منتجات'
            ],
            'slug'=>'Products'

        ]);
        Section::factory()->create([
            'name'=>[
                'en'=>'Users',
                'ar'=>'الاذونات'
            ],
            'slug'=>'Users'

        ]);


        Section::factory()->create([
            'name'=>[
                'en'=>'Permissions',
                'ar'=>'الاذونات'
            ],
            'slug'=>'Permissions'

        ]);
        Section::factory()->create([
            'name'=>[
                'en'=>'Rules',
                'ar'=>'القواعد'
            ],
            'slug'=>'Rules'

        ]);

        Section::factory()->create([
            'name'=>[
                'en'=>'Rules & Permissions',
                'ar'=>'القواعد'
            ],
            'slug'=>'Rules-Permissions'

        ]);


        Section::factory()->create([
            'name'=>[
                'en'=>'Social Media',
                'ar'=>'ميديا'
            ],
            'slug'=>'Social-Media'

        ]);





    }
}
