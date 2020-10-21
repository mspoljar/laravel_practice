<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $directory='/images/categories/';

    public $translatedAttributes=['name','slug'];

    protected $fillable=['path'];
    

    public function categoryTranslation()
    {
        return $this->hasMany('App\Models\CategoryTranslation');
    }

    public function meals()
    {
        return $this->hasMany('\App\Models\Meal');
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
