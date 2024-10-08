<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>Category::inRandomOrder()->first()->id ,
            'image'=>$this->faker->imageUrl() ,
            'price'=>$this->faker->numberBetween(100.0,575.0),
            'description'=>[
                'en'=>$this->faker->sentence(20) ,
                'ar'=>$this->faker->sentence(20)
            ],

        ];
    }
}
