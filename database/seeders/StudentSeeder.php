<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->admin()->count(6)->create()->each(function($student){
            Certification::factory()->create([

                'student_id'=>$student->ID,
                'exam_id'=>Exam::factory()->create()->id ,

            ]);


        });

        Student::factory()->student()->count(6)->create()->each(function($student){

            Certification::factory()->create([
                'student_id'=>$student->ID,
                'exam_id'=>Exam::factory()->create()->id ,
            ]);
        });
    }
}
