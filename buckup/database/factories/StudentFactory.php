<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'UserName'=>$this->faker->name,
            'alt_email'=>$this->faker->email,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phoneNumber ,
            'address'=>$this->faker->address ,
            'password'=>encrypt('admin')
        ];
    }

    public function admin():self
    {
        return $this->state([
            'type'=>Student::ADMIN
        ]);
    }

    public function student():self
    {
        return $this->state([
            'type'=>Student::STUDENT
        ]);
    }

}
