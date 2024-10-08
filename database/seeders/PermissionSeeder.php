<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory()->add()->create();
        Permission::factory()->edit()->create();
        Permission::factory()->read()->create();
        Permission::factory()->delete()->create();
    }
}
