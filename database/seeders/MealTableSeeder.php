<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Meal::factory()->hasAttached(\App\Models\Tag::factory()->count(rand(1,3)))
                                   ->hasAttached(\App\Models\Ingredient::factory()->count(rand(1,5)))
                                   ->has(\App\Models\MealTranslation::factory()->count(2))->create();
    }
}
