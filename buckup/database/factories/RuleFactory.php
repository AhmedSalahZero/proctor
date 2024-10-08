<?php

namespace Database\Factories;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

        ];
    }

    public function admin():self
    {
       return $this->state([
            'name'=>[
                'en'=>'admin',
                'ar'=>'اداري'
            ],
           'type'=>'backoffice',
            'slug'=>'admin',
            'id'=>user::adminRule
        ]);
    }
    public function moderator():self
    {
        return $this->state([
            'name'=>[
                'en'=>'moderator',
                'ar'=>'مشرف'
            ],
            'type'=>'backoffice',
            'slug'=>'moderator',
            'id'=>user::moderatorRule,

        ]);
    }

    public function editor():self
    {
        return $this->state([
            'name'=>[
                'en'=>'editor',
                'ar'=>'مدخل بيانات'
            ],
            'type'=>'backoffice',
            'slug'=>'editor',
            'id'=>user::editorRule
        ]);
    }

    public function user():self
    {
        return $this->state([
            'name'=>[
                'en'=>'user',
                'ar'=>'مستخدم'
            ],
            'type'=>'website',
            'slug'=>'user',
            'id'=>User::userRule
        ]);
    }

    public function account():self
    {
        return $this->state([
            'name'=>[
                'en'=>'account',
                'ar'=>'حساب'
            ],
            'type'=>'website',
            'slug'=>'account',
            'id'=>User::accountRule
        ]);
    }





}
