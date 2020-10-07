<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    //
    public function ingredients(){


        return $this->belongstoMany('App\Ingredient');


    }
}
