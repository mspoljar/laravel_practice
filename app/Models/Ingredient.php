<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ingredient extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    

    public $translatedAttributes=['name','slug'];
    public function ingredientTranslation()
    {
        return $this->hasMany('App\Models\IngredientTranslation');
    }

    public function meal()
    {
        return $this->belongsToMany('App\Models\Meal');
    }

}
