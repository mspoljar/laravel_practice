<?php

namespace Database\Factories;

use App\Models\TagTranslation;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagTranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagTranslation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count=Tag::count();
        return [
            'locale'=>$this->faker->unique()->randomElement(['en','hr']),
            'name'=>$this->faker->name,
            'slug'=>$this->faker->slug,
            'tag_id'=>$this->faker->numberBetween(1,$count)
        ];
    }
}
