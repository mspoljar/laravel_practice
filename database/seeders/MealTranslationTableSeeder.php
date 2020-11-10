<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\MealTranslation;

class MealTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $subjects= MealTranslation::factory()->count(20)->make();
        foreach ($subjects as $subject) {
            repeat:
            try {
                $subject->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $subject = MealTranslation::factory()->make();
                goto repeat;
            }
        }
    }
}
