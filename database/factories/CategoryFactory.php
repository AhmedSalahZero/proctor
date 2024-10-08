<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>['en'=>$nameEn = $this->faker->name , 'ar'=>$this->faker->name] ,
            'parent_id'=>6 ,
            'slug'=>Str::slug($nameEn)
        ];
    }
    public function parent():self
    {
        return $this->state([
            'parent_id'=>null
        ]);
    }
    public function child($parentId)
    {
        return $this->state([
            'parent_id' =>$parentId
        ]);
    }
}
