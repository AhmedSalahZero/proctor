<?php

namespace Database\Factories;

use App\Models\Certification;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(2),
            'pass_percentage'=>50 ,
            'zoom_link'=>$this->faker->url,
            'no_questions'=>$this->faker->numberBetween(50,80),
            'start_date'=>$this->faker->dateTime(),
            'duration'=>$this->faker->numberBetween(30,60),
        ];
    }


}
