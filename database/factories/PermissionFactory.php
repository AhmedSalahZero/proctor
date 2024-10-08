<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function edit():self
    {
        return $this->state([
            'name'=>[
                'en'=>'edit',
                'ar'=>'تعديل'
            ] ,
            'slug'=>'edit'
        ]);
    }

    public function add():self
    {
        return $this->state([
            'name'=>[
                'en'=>'create',
                'ar'=>'اضافة'
            ],
            'slug'=>'create'
        ]);
    }

    public function read():self
    {
        return $this->state([
            'name'=>[
                'en'=>'read',
                'ar'=>'عرض'
            ],

            'slug'=>'read'
        ]);
    }

    public function delete():self
    {
        return $this->state([
            'name'=>[
                'en'=>'delete',
                'ar'=>'حذف'
            ],

            'slug'=>'delete'
        ]);
    }

}
