<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //

    public function ingredients(){


        return $this->belongstoMany('App\Meal');


    }

    public function ingredientname(){

        return $this->hasMany('App\Ingredient');

    }
}
