<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table= 'meals';
    protected $primaryKey= 'meal_id';
}
