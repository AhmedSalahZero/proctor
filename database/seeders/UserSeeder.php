<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->admin()->create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin')
        ]);
        user::factory()->moderator()->create([
            'name'=>'moderator',
            'email'=>'moderator@moderator.com' ,
            'password'=>Hash::make('moderator') ,
        ]);
        user::factory()->editor()->create([
            'name'=>'editor',
            'email'=>'editor@editor.com' ,
            'password'=>Hash::make('editor') ,
        ]);

        user::factory()->user()->create([
            'name'=>'user',
            'email'=>'user@user.com' ,
            'password'=>Hash::make('user') ,
        ]);

        user::factory()->account()->create([
            'name'=>'account',
            'email'=>'account@account.com' ,
            'password'=>Hash::make('account') ,
        ]);




    }
}
