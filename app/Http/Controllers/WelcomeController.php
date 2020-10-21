<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ingredient;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function search()
    {
        return view('search');
    }

    public function meal()
    {
        return view('search.meal');
    }

    public function category()
    {
        $categories=Category::all();
        return view('search.category',['categories'=>$categories]);
    }

    public function tag()
    {
        $tags=tag::all();
        return view('search.tag',['tags'=>$tags]);
    }

    public function ingredient()
    {
        $ingredients=ingredient::all();
        return view('search.ingredient',['ingredients'=>$ingredients]);
    }

    public function searchresults(Request $request)
    {
        $lang=$request->session()->get('language');
        switch($request->id)
        {   
          case 0:
               
               $searchresults=Meal::whereHas('MealTranslation',function(Builder $query) use($lang,$request){
                   $query->where('locale','=',$lang)->where('name', 'like','%'. $request->input('query') .'%');
               })->get();
                return view('search.result',['results'=>$searchresults]);
            break;
        }

    }
}
