<?php

namespace Database\Seeders;

use App\Models\CourseType;
use App\Models\Stack;
use Illuminate\Database\Seeder;

class StackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stack::factory()->count(3)->create();

    }
}
