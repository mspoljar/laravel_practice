<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    
    public $translatedAttributes=['name','slug'];

    protected $fillable=['meal_id'];

    public function tagTranslation()
    {
        return $this->hasMany('App\Models\Tagtranslation');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Models\Meal');
    }

}
