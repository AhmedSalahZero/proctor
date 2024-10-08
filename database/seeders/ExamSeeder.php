<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Seeder;
class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::factory()->count(6)->create()->each(function($exam){

            $exam->students()->attach(Student::factory()->admin()->create()->ID,[
                'remaining_time'=>0,
                'time'=>$exam->duration,
                'Started_At'=>$exam->start_date,
                'Done'=>false
            ]);

//            $certification = Certification::factory()->create([
//                'type'=>'automatic',
//                'display'=>false
//            ]);
         //   $exam->certification_id = $certification->id;
            $exam->save();
        });
        Exam::factory()->count(6)->create()->each(function($exam){
            $exam->students()->attach(Student::factory()->student()->create()->ID ,[
                    'remaining_time'=>0,
                    'time'=>$exam->duration,
                    'Started_At'=>$exam->start_date,
                    'Done'=>false

            ]);

//            $certification = Certification::factory()->create([
//                'type'=>'manual',
//                'display'=>true
//            ]);
       //     $exam->certification_id = $certification->id ;
            $exam->save();
        });
    }
}
