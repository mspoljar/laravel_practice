<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\MealTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Tag;
use App\Models\TagTranslation;
use App\Models\Ingredient;
use App\Models\IngredientTranslation;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      /*  DB::statement('SET FOREIGN_KEY_CHECKS=0');
      
       DB::table('categories')->truncate();
       DB::table('category_translation')->truncate();
       DB::table('ingredients')->truncate();
       DB::table('ingredient_translation')->truncate();
       DB::table('meals')->truncate();
       DB::table('meal_translation')->truncate();
       DB::table('tag')->truncate();
       DB::table('tag_translation')->truncate();
        */
        $this->call([
            CategoryTableSeeder::class,
            CategoryTranslationTableSeeder::class,
            IngredientTableSeeder::class,
            IngredientTranslationTableSeeder::class,
            TagTableSeeder::class,
            TagTranslationTableSeeder::class,
            MealTableSeeder::class,
            MealTranslationTableSeeder::class,
        ]);
    }
}
