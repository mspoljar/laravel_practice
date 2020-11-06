<?php

namespace Database\Factories;

use App\Models\CategoryTranslation;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CategoryTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count=Category::count();
        return [
            'locale'=>$this->faker->unique()->randomElement(['en','hr']),
            'name'=>$this->faker->name,
            'slug'=>$this->faker->slug,
            'category_id'=>$this->faker->numberBetween(1,$count)
        ];
    }
}
