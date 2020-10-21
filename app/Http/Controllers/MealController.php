<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

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
        return view('meal.change',['meal'=>$meal]);
    }

    public function update(Request $request){
        $lang=$request->session()->get('language');
        $meal=Meal::findorFail($_POST['id']);
        $validatedData=$request->validate([
            'image'=>'required|image',
            'name'=>'required'
        ]);
        if($request->hasFile('image')){
            $pic=$request->file('image');
            $name=$pic->getClientOriginalName();
            $pic->move('images\meals',$name);
            $meal->update(['path'=>$name]);
        }
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
        return view('meal.new',['meal'=>$meal,'id'=>$id]);
    }

    public function addnew(Request $request)
    {
        $meal=Meal::findorFail($request->id);
        $validatedData=$request->validate([
            'image'=>'required|image',
            'enname'=>'required',
            'hrname'=>'required'
        ]);
        if($request->hasFile('image')){
            $pic=$request->file('image');
            $name=$pic->getClientOriginalName();
            $pic->move('images\meals',$name);
            $meal->update(['path'=>$name]);
        }
        $meal->mealTranslation()->create(['locale'=>'en','name'=>$request->enname]);
        $meal->mealTranslation()->create(['locale'=>'hr','name'=>$request->hrname]);
        return redirect('/menu');
    }
}
