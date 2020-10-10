<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientTranslation extends Model
{
    //

    protected $fillable = [
        'ingredients_id',
        'locale',
        'name'
    ];

    public function ingredientname(){

        return $this->hasOne('App\Ingredient');

    }
}
