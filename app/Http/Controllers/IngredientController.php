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
        return view('ingredients',compact('ingredients'));
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
           'image'=>'required|image',
           'name'=>'required'
       ]);
       if($request->hasFile('image')){
           $pic=$request->file('image');
           $name=$pic->getClientOriginalName();
           $pic->move('images\ingredients',$name);
           $ingredient->update(['image'=>$name]);
       }
       
        $ingredient->ingredientTranslation()->whereLocale($lang)->update(['name'=>$request->name]);
        return redirect('/ingredient');

        
    }
}
