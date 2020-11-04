<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    //

    public function index()
    {
       $ingredients = Ingredient::translatedIn(app()->getLocale())
       ->paginate(5); 
       return view('ingredients',['ingredients'=>$ingredients]);
    
    }

    public function change($id)
    {
        $ingredient=Ingredient::findorFail($id);
        return view('ingredient.change',compact('ingredient'));
    }

    public function update(Request $request)
    {
        $ingredient=Ingredient::findorFail($request->id);
        $lang=$request->session()->get('language');
       $validatedData=$request->validate([
           'name'=>'required',
           'slug'=>'required'
       ]);
       
        $ingredient->ingredientTranslation()->whereLocale($lang)->update(['name'=>$request->name,'slug'=>$request->slug]);
        return redirect('/ingredient');

        
    }

    public function new()
    {
        $ingredient=new Ingredient;
        $ingredient->save();
        $id=$ingredient->id;
        return view('ingredient.new',['ingredient'=>$ingredient,'id'=>$id]);
    }

    public function addnew(Request $request)
    {
        $ingredient=Ingredient::findorfail($request->id);
        $validatedData=$request->validate([
            'enname'=>'required',
            'enslug'=>'required',
            'hrname'=>'required',
            'hrslug'=>'required'
        ]);
        $ingredient->ingredientTranslation()->create(['locale'=>'en','name'=>$request->enname,'slug'=>$request->enslug]);
        $ingredient->ingredientTranslation()->create(['locale'=>'hr','name'=>$request->hrname,'slug'=>$request->hrslug]);
        return redirect('/ingredient');
        
    }

    public function delete($id)
    {
        $ingredient=Ingredient::findorfail($id);
        $ingredient->ingredientTranslation()->delete();
        $ingredient->delete();
        return redirect('/ingredient');
    }
}
