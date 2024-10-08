<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Certification;
use App\Models\Stack;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


//        Admin::FirstOrCreate([
//            'email'=>'admin@admin.com',
//            'password'=>encrypt('admin'),
//            'name'=>'admin',
//        ]);

        $this->call(StudentSeeder::class);



        $this->call(ExamSeeder::class);

    }
}
