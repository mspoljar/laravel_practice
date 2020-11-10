<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count=Category::count();
        return [
            'created_at'=>now(),
            'category_id'=>$this->faker->numberBetween(1,$count)
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function ($meal) {
            //
        })->afterCreating(function ($meal) {
            for($i=0;$i<rand(1,5);$i++){
                $meal->ingredients()->attach(rand(1,count(Ingredient::all())));
            }
            for($j=0;$j<rand(1,3);$j++){
                $meal->tags()->attach(rand(1,count(Tag::all())));
            }
        });
    } 
}
