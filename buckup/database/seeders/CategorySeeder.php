<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category ;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $parent = Category::factory()->parent()->create() ; 
        Category::factory()->child($parent->id)->count(2)->create();
    }
}
