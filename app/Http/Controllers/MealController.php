<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    //
    public function menu()
    {
        return view('menu',['menu'=>Meal::all()]);
    }
}
