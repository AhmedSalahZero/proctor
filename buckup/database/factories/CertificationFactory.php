<?php

namespace Database\Factories;

use App\Models\Certification;
use App\Models\CourseType;
use App\Models\Model;
use App\Models\Stack;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        //    'name'=>$this->faker->name ,
            'course_type'=>CourseType::inRandomOrder()->first()->id ,
            'completed_date'=>$this->faker->date(),
            'valid_to'=>Carbon::make($this->faker->date())->addYears(2),
            'certification_id'=>'F1BB179E-DE73D' ,
            'link'=>'https://www.google.com.eg',
            'provider_number'=>$this->faker->phoneNumber,
            'supplement'=>'supplement name',
            'provider'=>'provider name',
        ];
    }

    public function manual():self
    {
        return $this->state([
            'display'=>true
        ]);
    }

    public function automatic():self
    {
        return $this->state([
            'display'=>false

        ]);
    }
}
