<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->create([
            'id'=>$id = 1,
            'name'=>[
                'en'=>$NameEn = 'Jet Ski' ,
                'ar'=>'زلاجة'
            ],
            'slug'=>Str::slug($NameEn).'-'.$id
        ]);

        Product::factory()->create([
            'id'=>$id = 2,
            'name'=>[
                'en'=>$NameEn = 'Crock Pot' ,
                'ar'=>'وعاء من الفخار'
            ],
            'slug'=>Str::slug($NameEn).'-'.$id
        ]);
        Product::factory()->create([
            'id'=>$id = 3,
            'name'=> [
                'en'=>$NameEn = 'Kleenex' ,
                'ar'=>'مناديل'
            ],
            'slug'=>Str::slug($NameEn).'-'.$id
      ]);

    }
}
