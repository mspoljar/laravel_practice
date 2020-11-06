<?php

namespace Database\Factories;

use App\Models\IngredientTranslation;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IngredientTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count=Ingredient::count();
        return [
            'locale'=>$this->faker->unique()->randomElement(['en','hr']),
            'name'=>$this->faker->name,
            'slug'=>$this->faker->slug,
            'ingredient_id'=>$this->faker->numberBetween(1,$count)
        ];
    }
}
