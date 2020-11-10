<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes=[
        'name','description'
    ];
    

    public function mealTranslation()
    {
        return $this->hasMany('App\Models\MealTranslation');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient')->withPivot('meal_id','ingredient_id');
    }

}
