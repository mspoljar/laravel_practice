<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Tag;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Support\Collection;

class MealController extends Controller
{
    //
    public function menu()
    {
        $meals = Meal::translatedIn(app()->getLocale())
            ->paginate(5);
        return view('menu',compact('meals'));
    }

    public function change($id){

        $meal=Meal::findorFail($id);
        return view('meal.change',[
            'meal'=>$meal,
            'ingredients'=>Ingredient::all(),
            'tags'=>Tag::all(),
            'categories'=>Category::all()
            ]);
    }

    public function update(Request $request){
        $lang=$request->session()->get('language');
        $meal=Meal::findorFail($_POST['id']);
        $validatedData=$request->validate([
            'name'=>'required',
            'ingredients'=>'required|min:1',
            'tags'=>'required|min:1',
            'category'=>'nullable|max:1'
        ]);
        $meal->mealTranslation()->whereLocale($lang)->update(['name'=>$_POST['name']]);
       return redirect('/menu');
    }

    public function delete($id){
        $meal=Meal::findorFail($id);
        $meal->mealTranslation()->delete();
        $meal->delete();
        return redirect('/menu');
    }

    public function new()
    {
        $meal=new Meal;
        $meal->save();
        $id=$meal->id;
        return view('meal.new',[
            'meal'=>$meal,
            'id'=>$id,
            'ingredients'=>Ingredient::all(),
            'tags'=>Tag::all(),
            'categories'=>Category::all()
            ]);
    }

    public function addnew(Request $request)
    {
        $meal=Meal::findorFail($request->id);
       $validatedData=$request->validate([
            'enname'=>'required',
            'hrname'=>'required',
            'ingredients'=>'required|min:1',
            'tags'=>'required|min:1',
            'category'=>'nullable|max:1'
        ]);
        $meal->mealTranslation()->create(['locale'=>'en','name'=>$request->enname]);
        $meal->mealTranslation()->create(['locale'=>'hr','name'=>$request->hrname]);
        if($request->category=null)
        {
        exit;
        }
        else{
            $meal->update(['category'=>$request->category]);
        }
        foreach($request->ingredients as $ingredient =>$value)
        {
            $meal->ingredients()->attach($ingredient);
        }
        foreach($request->tags as $tag=>$value)
        {
            $meal->tags()->attach($ingredient);
        }
        
        return redirect('/menu');
        
    }

    public function show($id)
    {
        $meal=Meal::findorFail($id);
        $ingredients=Meal::findorFail($id)->ingredients->toArray();
        $tags=Meal::findorFail($id)->tags->toArray();
        return view('meal.show',compact('meal','ingredients','tags'));
    }
}
