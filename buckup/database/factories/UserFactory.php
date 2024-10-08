<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone'=>$this->faker->phoneNumber,
//            'call_at'=>$this->faker->dateTime(),
            'address'=>$this->faker->address ,
//            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
            'media_id'=>Media::inRandomOrder()->first()->id //website

        ];
    }
    public function admin():self
    {
        return $this->state([
            'rule_id'=>User::adminRule ,
        ]);
    }

    public function moderator():self
    {
        return $this->state([
            'rule_id'=>User::moderatorRule ,
        ]);
    }

    public function editor():self
    {
        return $this->state([
            'rule_id'=>User::editorRule,
        ]);
    }

    public function user():self
    {
        return $this->state([
            'rule_id'=>User::userRule ,
        ]);
    }

    public function account():self
    {
        return $this->state([
            'rule_id'=>User::accountRule ,
        ]);
    }




}
