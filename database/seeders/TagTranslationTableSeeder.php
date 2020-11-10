<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TagTranslation;

class TagTranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects= TagTranslation::factory()->count(20)->make();
        foreach ($subjects as $subject) {
            repeat:
            try {
                $subject->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $subject = TagTranslation::factory()->make();
                goto repeat;
            }
        }
    }
}
