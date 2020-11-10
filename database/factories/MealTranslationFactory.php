<?php

namespace Database\Factories;

use App\Models\MealTranslation;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MealTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count=Meal::count();
       do{
        return [
            'locale'=>$this->faker->randomElement(['en','hr']),
            'name'=>$this->faker->name,
            'description'=>$this->faker->text,
            'meal_id'=>$this->faker->numberBetween(1,$count)
        ];
        if(MealTranslation::count()===2){
            $i++;
            }
        }while($i=0);
    }
}
