<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    //
    public function menu()
    {
        $meals=Meal::all();
        return view('menu',['menu'=>$meals]);
    }

    public function change($id){

        $meal=Meal::findorFail($id);
        return view('meal.change',['meal'=>$meal]);
    }

    public function update(Request $request){
        $lang=$request->session()->get('language');
        $meal=Meal::findorFail($_POST['id']);
        $meal->mealTranslation()->whereLocale($lang)->update(['name'=>$_POST['name']]);
       return view('meal.updated');
    }

    public function delete($id){
        $meal=Meal::findorFail($id);
        $meal->mealTranslation()->delete();
        $meal->delete();
        return view('meal.deleted');
    }

    public function new()
    {
        $meal=new Meal;
        $meal->save();
        $id=$meal->id;
        return view('meal.new',['meal'=>$meal,'id'=>$id]);
    }

    public function addnew()
    {
        $meal=Meal::findorFail($_POST['id']);
        $meal->mealTranslation()->create(['locale'=>'en','name'=>$_POST['enname']]);
        $meal->mealTranslation()->create(['locale'=>'hr','name'=>$_POST['hrname']]);
        return $this->menu();
    }
}
