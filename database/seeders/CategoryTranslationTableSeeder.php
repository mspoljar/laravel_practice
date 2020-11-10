<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $subjects= \App\Models\CategoryTranslation::factory()->count(20)->make();
        foreach ($subjects as $subject) {
            repeat:
            try {
                $subject->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $subject = \App\Models\CategoryTranslation::factory()->make();
                goto repeat;
            }
        }
    }
}
