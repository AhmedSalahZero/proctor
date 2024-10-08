<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::factory()->admin()->create();
        Rule::factory()->moderator()->create();
        Rule::factory()->editor()->create();
        Rule::factory()->user()->create();
        Rule::factory()->account()->create();

    }
}
