<?php

namespace Database\Seeders;

use App\Models\Log;
use App\Models\Student;
use Illuminate\Database\Seeder;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Student::where('Type_Id' , 4)->get() as $instructor){
            Log::create([
                'instructor_id'=>$instructor->ID ,
                'password'=> generateRandomString(5),
            ]);
        }
    }
}
