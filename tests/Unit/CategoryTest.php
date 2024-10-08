<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Category ;
use \Tests\TestCase ;


class CategoryTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_returns_slug_from_name()
    {
        $parentCategory = Category::factory()->parent()->create([
            'name'=> ['en'=>$nameEn='category x en' , 'ar'=>'category x ar'] ,
            'slug'=>$nameEn
        ]);

        $this->assertEquals($parentCategory->slug , 'category-x-en');
    }
    public function test_it_has_many_children()
    {
        $parent = Category::factory()->parent()->create();

        $children = Category::factory()->child($parent->id)->count(2)->create();

        $this->assertInstanceOf(Category::class , $parent->subCategories->first());
    }
    public function test_it_belongs_to_has_one_parent()
    {
        $parent = Category::factory()->parent()->create();
        $child = Category::factory()->child($parent->id)->create();

        $this->assertInstanceOf(Category::class , $child->parentCategory);
    }
    public function test_it_casts_the_name()
    {
        $parent = Category::factory()->parent()->create([
            'name'=>[
                'en'=>'jackets_en' ,
                'ar' =>'jackets_ar'
            ]
        ]);
        $this->assertEquals('jackets_ar', $parent->name['ar']);
    }

}
