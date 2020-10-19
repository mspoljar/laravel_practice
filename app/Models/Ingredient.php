<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ingredient extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=['path'];

    public $translatedAttributes=['name'];

    public function ingredientTranslation()
    {
        return $this->hasMany('App\Models\IngredientTranslation');
    }


}
